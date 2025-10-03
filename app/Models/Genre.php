<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends BaseModel
{
    /** @use HasFactory<\Database\Factories\GenreFactory> */
    use HasFactory;

    protected $fillable = [
        'genre_name',
    ];

    public $timestamps = false;

    public function animeGenre(): HasMany
    {
        return $this->hasMany(AnimeGenre::class);
    }
}
