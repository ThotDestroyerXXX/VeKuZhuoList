<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Studio;
use App\Models\VoiceActor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');

        if (empty($query)) {
            return redirect('/');
        }

        // Search across multiple models
        $animes = Anime::where('anime_name', 'LIKE', "%{$query}%")
            ->orWhere('synopsis', 'LIKE', "%{$query}%")
            ->with(['studio', 'genres', 'season'])
            ->get();

        $studios = Studio::where('studio_name', 'LIKE', "%{$query}%")
            ->with('anime')
            ->get();

        $voiceActors = VoiceActor::where('voice_actor_name', 'LIKE', "%{$query}%")
            ->get();

        return view('search.page', compact('animes', 'studios', 'voiceActors', 'query'));
    }
}
