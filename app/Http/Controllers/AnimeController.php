<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Character;
use App\Models\Genre;
use App\Models\Season;
use App\Models\Studio;
use App\Models\VoiceActor;
use App\Http\Requests\AnimeStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimeController extends Controller
{
    public function show(Anime $anime)
    {
        return view('anime.detail', [
            'anime' => $anime->load(['genres', 'studio', 'season', 'characters', 'characters.voiceActor']),
        ]);
    }

    public function create()
    {
        return view('anime.add', [
            'studios' => Studio::all(),
            'genres' => Genre::all(),
            'seasons' => Season::all(),
            'voiceActors' => VoiceActor::all(),
        ]);
    }

    public function store(AnimeStoreRequest $request)
    {
        $validatedData = $request->validated();

        // Extract data that won't be directly saved to anime table
        $genres = $validatedData['genres'] ?? [];
        $characterImageUrls = $validatedData['character_image_url'] ?? [];
        $characterNames = $validatedData['character_name'] ?? [];
        $voiceActorIds = $validatedData['voice_actor_id'] ?? [];

        // Remove non-anime fields from validated data
        unset(
            $validatedData['genres'],
            $validatedData['character_image_url'],
            $validatedData['character_name'],
            $validatedData['voice_actor_id'],
            $validatedData['status']
        );

        // Handle image upload
        $path = Storage::disk('public')->putFile('anime_images', $validatedData['image']);
        if ($path) {
            $validatedData['image_url'] = $path;
        }
        unset($validatedData['image']); // Remove original image field

        // Extract YouTube video ID from trailer URL
        if (isset($validatedData['trailer_url'])) {
            $url = $validatedData['trailer_url'];
            parse_str(parse_url($url, PHP_URL_QUERY), $params);
            $validatedData['trailer_url'] = $params['v'] ?? '';
        }

        // Create anime record
        $anime = Anime::create($validatedData);

        // Handle Genre relationships (Many-to-Many via anime_genres pivot table)
        if (!empty($genres)) {
            $anime->genres()->sync($genres);
        }

        // Handle Character creation
        if (!empty($characterNames)) {
            foreach ($characterNames as $index => $characterName) {
                Character::create([
                    'character_name' => $characterName,
                    'character_image' => $characterImageUrls[$index] ?? '',
                    'voice_actor_id' => $voiceActorIds[$index],
                    'anime_id' => $anime->id,
                ]);
            }
        }

        return redirect('/')->with('success', 'Anime added successfully!');
    }

    public function edit(Anime $anime)
    {
        return view('anime.edit', [
            'anime' => $anime->load(['genres', 'characters', 'characters.voiceActor']),
            'studios' => Studio::all(),
            'genres' => Genre::all(),
            'seasons' => Season::all(),
            'voiceActors' => VoiceActor::all(),
        ]);
    }

    public function update(AnimeStoreRequest $request, Anime $anime)
    {
        $validatedData = $request->validated();

        // Extract data that won't be directly saved to anime table
        $genres = $validatedData['genres'] ?? [];
        $characterImageUrls = $validatedData['character_image_url'] ?? [];
        $characterNames = $validatedData['character_name'] ?? [];
        $voiceActorIds = $validatedData['voice_actor_id'] ?? [];

        // Remove non-anime fields from validated data
        unset(
            $validatedData['genres'],
            $validatedData['character_image_url'],
            $validatedData['character_name'],
            $validatedData['voice_actor_id'],
            $validatedData['status']
        );

        // Handle image upload only if new image is provided
        if (isset($validatedData['image'])) {
            // Delete the old image if it exists
            if ($anime->image_url && Storage::disk('public')->exists($anime->image_url)) {
                Storage::disk('public')->delete($anime->image_url);
            }

            // Upload new image
            $path = Storage::disk('public')->putFile('anime_images', $validatedData['image']);
            if ($path) {
                $validatedData['image_url'] = $path;
            }
        }
        unset($validatedData['image']); // Remove original image field

        // Extract YouTube video ID from trailer URL
        if (isset($validatedData['trailer_url'])) {
            $url = $validatedData['trailer_url'];
            parse_str(parse_url($url, PHP_URL_QUERY), $params);
            $validatedData['trailer_url'] = $params['v'] ?? '';
        }

        // Update anime record
        $anime->update($validatedData);

        // Handle Genre relationships (Many-to-Many via anime_genres pivot table)
        if (!empty($genres)) {
            $anime->genres()->sync($genres);
        }

        // Handle Character updates - delete existing and create new ones
        $anime->characters()->delete();
        if (!empty($characterNames)) {
            foreach ($characterNames as $index => $characterName) {
                Character::create([
                    'character_name' => $characterName,
                    'character_image' => $characterImageUrls[$index] ?? '',
                    'voice_actor_id' => $voiceActorIds[$index],
                    'anime_id' => $anime->id,
                ]);
            }
        }

        return redirect()->route('anime', $anime)->with('success', 'Anime updated successfully!');
    }
}
