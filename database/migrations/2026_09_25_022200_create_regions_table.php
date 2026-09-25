<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();

            $table->text('card_image')->nullable();
            $table->text('background_image')->nullable();
            $table->text('landmark_image')->nullable();
            $table->text('icon')->nullable();
            $table->text('archon_icon')->nullable();

            $table->foreignId('element_id')
                ->constrained('elements')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};