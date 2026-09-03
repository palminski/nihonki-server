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
    // Returns null if the device is cleared to make a request, or a response to short-circuit with otherwise.
    private function checkEntitlement(DeviceService $deviceService, $device, string $appUserId)
    {
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

        return null;
    }

    // German nouns carry grammatical gender that isn't visible from the word alone —
    // prefixing the definite article (der/die/das) the way furigana surfaces reading for
    // Japanese. Keyed off the client-sent language label since that's all this generic
    // endpoint receives (no languageId).
    private function getExtraLearnerRules(string $targetLanguage): string
    {
        if ($targetLanguage === 'German') {
            return "\n- For nouns, prefix the word field with its definite article to show gender (\"der\", \"die\", or \"das\"), e.g. \"der Hund\", \"die Katze\", \"das Kind\". Do not add an article for verbs, adjectives, or other non-nouns.";
        }
        return '';
    }

    private function getExtraExample(string $targetLanguage): string
    {
        if ($targetLanguage === 'German') {
            return <<<EOT


Example noun with a gender article:
{
  "word": "der Hund",
  "meaning": "dog",
  "partOfSpeech": "noun",
  "exampleSentence": "Der <b>Hund</b> läuft im Park.",
  "exampleSentenceEnglish": "The dog runs in the park."
}
EOT;
        }
        return '';
    }

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

            $entitlementError = $this->checkEntitlement($deviceService, $device, $appUserId);
            if ($entitlementError) return $entitlementError;

            $replacements = [
                '{{LANGUAGE}}' => $targetLanguage,
                '{{EXTRA_RULES}}' => $this->getExtraLearnerRules($targetLanguage),
                '{{EXTRA_EXAMPLE}}' => $this->getExtraExample($targetLanguage),
            ];
            $systemInstructions = strtr(config('prompts.system_instructions_generic'), $replacements);
            $singleWordInstructions = strtr(config('prompts.single_word_instructions_generic'), $replacements);

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

    // For languages whose script doesn't reliably indicate pronunciation to a learner
    // (Mandarin, Cantonese) — the client sends which romanization system to use
    // (e.g. "Hanyu Pinyin with tone marks", "Jyutping with tone numbers").
    public function translateWordRomanized(Request $request)
    {
        try {
            $appUserId = $request->input("appUserId");
            $wordToTranslate = $request->input("wordToTranslate");
            $targetLanguage = $request->input("targetLanguage");
            $romanizationSystem = $request->input("romanizationSystem");

            if (!$targetLanguage || !$romanizationSystem) {
                return response()->json(
                    ['message' => 'targetLanguage and romanizationSystem are required'],
                    422
                );
            }

            $deviceService = new DeviceService();
            $device = $deviceService->accessOrCreateDeviceFromId($appUserId);

            $entitlementError = $this->checkEntitlement($deviceService, $device, $appUserId);
            if ($entitlementError) return $entitlementError;

            $replacements = ['{{LANGUAGE}}' => $targetLanguage, '{{ROMANIZATION}}' => $romanizationSystem];
            $systemInstructions = strtr(config('prompts.system_instructions_romanized'), $replacements);
            $singleWordInstructions = strtr(config('prompts.single_word_instructions_romanized'), $replacements);

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
