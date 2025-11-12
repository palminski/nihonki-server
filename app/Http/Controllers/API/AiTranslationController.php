<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\ClubService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Device;
use App\Services\DeviceService;
use OpenAI;

use function PHPSTORM_META\type;

class AiTranslationController extends Controller
{
    // Get all Teams
    public function index(Request $request)
    {
        try {
            return response()->json(
                [
                    'message' => 'Open Ai Controller',
                ],
                201
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'message' => 'An error was encountered!',
                ],
                500
            );
        }
    }

    public function translateWord(Request $request)
    {
        try {
            $appUserId = $request->input("appUserId");
            $wordToTranslate = $request->input("wordToTranslate");

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
                Log::alert($entitlement);
                return response()->json(['valid' => false, 'reason' => 'User does not have required entitlement'], 403);
            }

            $key = config('services.openai.key');
            $client = OpenAI::client($key);
            $response = $client->responses()->create([
                'model' => 'gpt-4.1-mini',
                'input' => [
                    ["role" => "system", "content" => config("prompts.system_instructions")],
                    ["role" => "system", "content" => config("prompts.single_word_instructions")],
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
        } catch (Exception $e) {
            Log::alert($e);
            return response()->json(
                [
                    'message' => 'An error was encountered!',
                ],
                500
            );
        }
    }

    public function translateImage(Request $request)
    {
        try {
            $appUserId = $request->input("appUserId");
            $base64 = $request->input("imageBase64");

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
            if ($device->images_remaining <= 0 && (!$entitlement || strtotime($entitlement["expires_date"]) < time())) {
                Cache::forget($cacheKey);
                return response()->json(['valid' => false, 'reason' => 'User does not have required entitlement'], 403);
            }

            $key = config('services.openai.key');


            if (str_starts_with($base64, 'data:image')) {
                $base64 = substr($base64, strpos($base64, ',') + 1);
            }

            $client = OpenAI::client($key);
            $response = $client->responses()->create([
                'model' => 'gpt-4.1-mini',
                'input' => [
                    ["role" => "system", "content" => config("prompts.system_instructions")],
                    ["role" => "system", "content" => config("prompts.image_scan_instructions")],
                    ["role" => "user", "content" => [['type' => "input_image", 'image_url' => "data:image/jpeg;base64,{$base64}"]]],
                ],
            ]);

            $deviceService->decrementImageUsages($device);

            return response()->json(
                [
                    'message' => ($response->outputText),
                ],
                201
            );
        } catch (Exception $e) {
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
