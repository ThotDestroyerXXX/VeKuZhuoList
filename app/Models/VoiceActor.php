<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VoiceActor extends BaseModel
{
    /** @use HasFactory<\Database\Factories\VoiceActorFactory> */
    use HasFactory;

    protected $fillable = [
        'voice_actor_name',
        'voice_actor_image',
    ];

    public function character(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
