<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Studio extends BaseModel
{
    /** @use HasFactory<\Database\Factories\StudioFactory> */
    use HasFactory;

    protected $fillable = [
        'studio_name',
    ];

    public function anime(): HasMany
    {
        return $this->hasMany(Anime::class);
    }
}
