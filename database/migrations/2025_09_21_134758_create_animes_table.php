<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('anime_name', length: 50);
            $table->date('release_date');
            $table->integer('views');
            $table->decimal('mal_score', 2, 1);
            $table->string('synopsis', length: 300);
            $table->integer('total_episodes');
            $table->string('trailer_url', length: 50);
            $table->string('image_url', length: 100);
            $table->foreignId('studio_id')->constrained('studios')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('season_id')->constrained('seasons')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
