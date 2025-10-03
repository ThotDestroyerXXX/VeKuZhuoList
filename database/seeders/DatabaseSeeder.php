<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            StudioSeeder::class,
            VoiceActorSeeder::class,
            GenreSeeder::class,
            SeasonSeeder::class,
            AnimeSeeder::class,
            AnimeGenreSeeder::class,
            CharacterSeeder::class,
        ]);
    }
}
