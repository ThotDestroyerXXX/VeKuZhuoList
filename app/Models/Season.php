<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends BaseModel
{
    /** @use HasFactory<\Database\Factories\SeasonFactory> */
    use HasFactory;

    protected $fillable = [
        'season_name',
    ];

    /**
     * Get the animes for the season.
     */
    public function anime(): HasMany
    {
        return $this->hasMany(Anime::class);
    }

    /**
     * Get the year from season_name
     */
    public function getYearAttribute()
    {
        return (int) explode(' ', $this->season_name)[1];
    }

    /**
     * Get the season name part only
     */
    public function getSeasonOnlyAttribute()
    {
        return explode(' ', $this->season_name)[0];
    }

    /**
     * Get seasons sorted by year and season order
     */
    public static function getSortedSeasons()
    {
        return Season::has('anime')->get()->sortBy(function ($season) {
            $seasonOrder = ['Winter' => 1, 'Spring' => 2, 'Summer' => 3, 'Fall' => 4];
            return [$season->year, $seasonOrder[$season->season_only] ?? 0];
        })->unique('season_name')->values();
    }
}
