<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AiTranslationController;


Route::prefix('/ai_translation')->group(function () {
    Route::post('/single_word', [APIAiTranslationController::class, 'translateWord']);
    Route::post('/image', [APIAiTranslationController::class, 'translateImage']);
});

// For Testing ----------------------------------------------
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello World!!!']);
});
