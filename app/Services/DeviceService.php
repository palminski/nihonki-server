<?php

namespace App\Services;

use App\Models\Device;
use Illuminate\Support\Facades\Log;

class DeviceService
{
    public function accessOrCreateDeviceFromId(string $deviceId)
    {
        $device = Device::where('device_id', $deviceId)->first();
        if ($device == null) {
            $device = new Device();
            $device->device_id = $deviceId;
            $device->words_remaining = 5;
            $device->images_remaining = 3;
            $device->save();
        }
        return $device;
    }

    public function decrementImageUsages(Device $device)
    {
        $device->images_remaining = max(0, $device->images_remaining - 1);
        $device->save();
    }

    public function decrementWordUsages(Device $device)
    {
        $device->words_remaining = max(0, $device->words_remaining - 1);
        $device->save();
    }
}
