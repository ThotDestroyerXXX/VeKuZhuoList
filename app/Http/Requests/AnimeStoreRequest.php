<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'anime_name' => 'required|string|max:100',
            'synopsis' => 'required|string|max:1000',
            'studio_id' => 'required|exists:studios,id',
            'season_id' => 'required|exists:seasons,id',
            'release_date' => 'required|date',
            'mal_score' => 'required|decimal:2|between:0,10',
            'trailer_url' => 'required|url|regex:/^https:\/\/www\.youtube\.com\/watch\?v=.+/',
            'image' => 'required|image|max:5120',
            'views' => 'required|integer|min:1',
            'total_episodes' => 'required|integer|min:1',
            'status' => 'required|in:Ongoing,Completed',
            'character_image_url' => 'required|array',
            'character_image_url.*' => 'required|url',
            'character_name' => 'required|array',
            'character_name.*' => 'required|string|max:100',
            'voice_actor_id' => 'required|array',
            'voice_actor_id.*' => 'required|exists:voice_actors,id',
            'genres' => 'required|array|between:1,3',
            'genres.*' => 'exists:genres,id',
        ];
    }
}
