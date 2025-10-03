<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function show(Season $season)
    {
        return view('season.page', [
            'season' => $season,
            'animes' => Anime::with(['genres', 'studio'])
                ->whereHas('season', function ($query) use ($season) {
                    $query->where('season_name', $season->season_name);
                })
                ->get(),
        ]);
    }
}
