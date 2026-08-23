<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\DeviceService;
use OpenAI;

class AiTranslationController extends Controller
{
    public function translateWord(Request $request)
    {
        try {
            $appUserId = $request->input("appUserId");
            $wordToTranslate = $request->input("wordToTranslate");
            $targetLanguage = $request->input("targetLanguage");

            if (!$targetLanguage) {
                return response()->json(
                    ['message' => 'targetLanguage is required'],
                    422
                );
            }

            $deviceService = new DeviceService();
            $device = $deviceService->accessOrCreateDeviceFromId($appUserId);

            //Check if user subscribed
            $cacheKey = "revcat_{$appUserId}";
            $subData = Cache::remember($cacheKey, now()->addMinutes(3), function () use ($appUserId) {
                $subValidRequest = Http::withHeaders([
                    'Authorization' => 'Bearer ' . config('services.revenuecat.key'),
                ])->get("https://api.revenuecat.com/v1/subscribers/{$appUserId}");
                if ($subValidRequest->failed()) {
                    throw new \Exception('Failed To Fetch Subscription Data');
                }
                return $subValidRequest->json();
            });

            $entitlement = $subData["subscriber"]["entitlements"]["api_key_access"] ?? null;
            if ($device->words_remaining <= 0 && (!$entitlement || strtotime($entitlement["expires_date"]) < time())) {
                Cache::forget($cacheKey);
                return response()->json(['valid' => false, 'reason' => 'User does not have required entitlement'], 403);
            }

            $systemInstructions = str_replace(
                '{{LANGUAGE}}',
                $targetLanguage,
                config('prompts.system_instructions_generic')
            );
            $singleWordInstructions = str_replace(
                '{{LANGUAGE}}',
                $targetLanguage,
                config('prompts.single_word_instructions_generic')
            );

            $key = config('services.openai.key');
            $client = OpenAI::client($key);
            $response = $client->responses()->create([
                'model' => 'gpt-4o-mini',
                'temperature' => 0.3,
                'input' => [
                    ["role" => "system", "content" => $systemInstructions],
                    ["role" => "system", "content" => $singleWordInstructions],
                    ["role" => "user", "content" => $wordToTranslate],
                ],
            ]);

            $deviceService->decrementWordUsages($device);

            return response()->json(
                [
                    'message' => ($response->outputText),
                ],
                201
            );
        } catch (\Throwable $e) {
            Log::alert($e);
            return response()->json(
                [
                    'message' => 'An error was encountered!',
                ],
                500
            );
        }
    }
}
