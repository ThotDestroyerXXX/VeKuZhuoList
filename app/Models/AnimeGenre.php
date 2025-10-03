<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimeGenre extends BaseModel
{
    /** @use HasFactory<\Database\Factories\AnimeGenreFactory> */
    use HasFactory;

    protected $fillable = [
        'anime_id',
        'genre_id',
    ];

    public $timestamps = false;

    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
