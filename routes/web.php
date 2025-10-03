<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\VoiceActorController;
use App\Models\Anime;
use App\Models\Genre;
use App\Models\Studio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.welcome');
});

Route::get('/top-viewed', function () {
    return view('top-viewed.page');
})->name('top-viewed');

Route::get('/top-rated', function () {
    return view('top-rated.page');
})->name('top-rated');

Route::get('studio/{studio}', function ($studioId) {
    $studio = Studio::with('anime')->findOrFail($studioId);

    return view('studio.detail', compact('studio'));
})->name('studio');

Route::get('genre/{genre}', [GenreController::class, 'show'])->name('genre');

Route::get('season/{season}', [SeasonController::class, 'show'])->name('season');


Route::prefix('anime')->group(function () {
    Route::get('/add', [AnimeController::class, 'create'])->name('anime.add');
    Route::post('/add', [AnimeController::class, 'store'])->name('anime.store');
    Route::get('/{anime}/edit', [AnimeController::class, 'edit'])->name('anime.edit');
    Route::put('/{anime}', [AnimeController::class, 'update'])->name('anime.update');
    Route::get('/{anime}', [AnimeController::class, 'show'])->name('anime');
});



Route::get('voice-actor/{voiceActor}', [VoiceActorController::class, 'show'])->name('voice-actor');

Route::get('search', [SearchController::class, 'search'])->name('search');
