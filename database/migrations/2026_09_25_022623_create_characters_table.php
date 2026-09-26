<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();

            $table->foreignId('region_id')
                ->constrained('regions')
                ->cascadeOnDelete();

            $table->foreignId('element_id')
                ->constrained('elements')
                ->cascadeOnDelete();

            $table->foreignId('weapon_id')
                ->constrained('weapons')
                ->cascadeOnDelete();

            $table->foreignId('artifact_id')
                ->nullable()
                ->constrained('artifacts')
                ->nullOnDelete();

            $table->string('name');
            $table->text('description')->nullable();

            $table->text('character_image')->nullable();
            $table->text('additional_image')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};