<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenAI;
use Illuminate\Support\Facades\Log;

class KoreanAiTranslationController extends Controller
{
    public function translateWord(Request $request)
    {
        try {
            $wordToTranslate = $request->input("wordToTranslate");
            
            $secretPasscode = $request->bearerToken();
            if(!$secretPasscode || !hash_equals(config("services.kath.secret"), $secretPasscode)) return response()->json(
                [
                    'message' => 'An error was encountered!',
                ],
                403
            );

            

            $key = config('services.openai.key');
            $client = OpenAI::client($key);
            $response = $client->responses()->create([
                'model' => 'gpt-4o-mini',
                'temperature' => 0.3,
                'input' => [
                    ["role" => "system", "content" => config("prompts.system_instructions_korean")],
                    ["role" => "system", "content" => config("prompts.single_word_instructions_korean")],
                    ["role" => "user", "content" => $wordToTranslate],
                ],
            ]);


            return response()->json(
                [
                    'message' => ($response->outputText),
                ],
                200
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
