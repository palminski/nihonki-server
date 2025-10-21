<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\ClubService;
use Illuminate\Support\Facades\Log;
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
            $wordToTranslate = $request->input("wordToTranslate");
            $key = env('OPENAI_API_KEY');
            
            $client = OpenAI::client($key);
            $response = $client->responses()->create([
                'model' => 'gpt-4.1-mini',
                'input' => [
                    ["role" => "system", "content" => config("prompts.system_instructions")],
                    ["role" => "system", "content" => config("prompts.single_word_instructions")],
                    ["role" => "user", "content" => $wordToTranslate],
                ],
            ]);

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
            $base64 = $request->input("imageBase64");
            $key = env('OPENAI_API_KEY');


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
