<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show(Genre $genre)
    {
        return view('genre.page', [
            'animes' => Anime::with('genres')
                ->whereHas('genres', function ($query) use ($genre) {
                    $query->where('genres.id', $genre->id);
                })->get(),
            'genre' => $genre,
        ]);
    }
}
