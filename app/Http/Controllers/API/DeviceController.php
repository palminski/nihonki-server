<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\ClubService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use OpenAI;

use function PHPSTORM_META\type;

class DeviceController extends Controller
{
    public function info(Request $request)
    {
        $appUserId = $request->input("appUserId");
        $device = Device::where('device_id', $appUserId)->first();
        if ($device == null) {
            $device = new Device();
            $device->device_id = $appUserId;
            $device->words_remaining = 5;
            $device->images_remaining = 3;
            $device->save();
        }
        $imagesRemaining = $device->images_remaining;
        $wordsRemaining = $device->words_remaining;
        $userSubscribed = true;


        //Check if user subscribed
        $cacheKey = "revcat_{$appUserId}";
        $subData = Cache::remember($cacheKey, now()->addMinutes(3), function () use ($appUserId) {
            $subValidRequest = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('REVENUECAT_API_KEY'),
            ])->get("https://api.revenuecat.com/v1/subscribers/{$appUserId}");
            if ($subValidRequest->failed()) {
                if ($appUserId == null) {
                    Log::info("App User ID was null");
                }

                if (env('REVENUECAT_API_KEY') == null) {
                    Log::info("Rev Cat API Key is Null");
                }
                throw new \Exception('Failed To Fetch Subscription Data');
            }
            return $subValidRequest->json();
        });
        $entitlement = $subData["subscriber"]["entitlements"]["api_key_access"] ?? null;

        if (!$entitlement || strtotime($entitlement["expires_date"]) < time()) {
            $userSubscribed = false;
        }

        return response()->json([
            'images_remaining' => $imagesRemaining,
            'words_remaining' => $wordsRemaining,
            'is_subscribed' => $userSubscribed,
        ]);
    }
}
