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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('character_name', length: 50);
            $table->string('character_image', length: 100);
            $table->foreignId('voice_actor_id')->constrained('voice_actors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('anime_id')->constrained('animes')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
