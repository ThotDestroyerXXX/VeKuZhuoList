<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends BaseModel
{
    /** @use HasFactory<\Database\Factories\CharacterFactory> */
    use HasFactory;

    protected $fillable = [
        'character_name',
        'character_image',
        'voice_actor_id',
        'anime_id',
    ];

    public $timestamps = false;

    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }

    public function voiceActor(): BelongsTo
    {
        return $this->belongsTo(VoiceActor::class);
    }
}
