<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AiTranslationController as APIAiTranslationController;
use App\Http\Controllers\API\FrenchAiTranslationController as APIFrenchAiTranslationController;
use App\Http\Controllers\API\DeviceController as APIDeviceController;

Route::prefix('/devices')->group(function () {
    Route::post('/info', [APIDeviceController::class, 'info']);
});

Route::prefix('/ai_translation')->group(function () {
    Route::post('/single_word', [APIAiTranslationController::class, 'translateWord']);
    Route::post('/image', [APIAiTranslationController::class, 'translateImage']);
});

Route::prefix('/french_ai_translation')->group(function () {
    Route::post('/single_word', [APIFrenchAiTranslationController::class, 'translateWord']);
});

// For Testing ----------------------------------------------
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello World!!!']);
});
