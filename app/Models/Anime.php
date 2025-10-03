<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anime extends BaseModel
{
    /** @use HasFactory<\Database\Factories\AnimeFactory> */
    use HasFactory;

    protected $fillable = [
        'anime_name',
        'synopsis',
        'studio_id',
        'season_id',
        'release_date',
        'mal_score',
        'trailer_url',
        'image_url',
        'views',
        'total_episodes',
    ];

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }

    public function animeGenre(): HasMany
    {
        return $this->hasMany(AnimeGenre::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'anime_genres');
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function voiceActors(): BelongsToMany
    {
        return $this->belongsToMany(VoiceActor::class, 'characters');
    }
}
