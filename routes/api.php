<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AiTranslationController as APIAiTranslationController;
use App\Http\Controllers\API\FrenchAiTranslationController as APIFrenchAiTranslationController;
use App\Http\Controllers\API\KoreanAiTranslationController as APIKoreanAiTranslationController;
use App\Http\Controllers\API\DeviceController as APIDeviceController;
use App\Http\Controllers\API\V2\AiTranslationController as APIV2AiTranslationController;

Route::prefix('/devices')->group(function () {
    Route::post('/info', [APIDeviceController::class, 'info']);
});

// Japanese
Route::prefix('/ai_translation')->group(function () {
    Route::post('/single_word', [APIAiTranslationController::class, 'translateWord']);
    Route::post('/image', [APIAiTranslationController::class, 'translateImage']);
});

// Korean
Route::prefix('/korean_ai_translation')->group(function () {
    Route::post('/single_word', [APIKoreanAiTranslationController::class, 'translateWord']);
});

// French
Route::prefix('/french_ai_translation')->group(function () {
    Route::post('/single_word', [APIFrenchAiTranslationController::class, 'translateWord']);
});

// V2 - Generalized endpoint used by the Nihonki app for every language besides Japanese.
// The client sends `targetLanguage` alongside the word, and the server drops it into a
// shared prompt template so the same endpoint/schema works for any language.
Route::prefix('/v2/ai_translation')->group(function () {
    Route::post('/single_word', [APIV2AiTranslationController::class, 'translateWord']);
    // For languages needing a pronunciation aid (Mandarin, Cantonese) — client also sends
    // `romanizationSystem` (e.g. "Hanyu Pinyin", "Jyutping").
    Route::post('/single_word_romanized', [APIV2AiTranslationController::class, 'translateWordRomanized']);
});

// For Testing ----------------------------------------------
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello World!!!']);
});
