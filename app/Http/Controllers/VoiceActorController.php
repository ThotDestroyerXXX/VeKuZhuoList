<?php

namespace App\Http\Controllers;

use App\Models\VoiceActor;
use Illuminate\Http\Request;

class VoiceActorController extends Controller
{
    public function show(VoiceActor $voiceActor)
    {
        return view('voice-actor.detail', [
            'voiceActor' => $voiceActor->load(['character', 'character.anime']),
        ]);
    }
}
