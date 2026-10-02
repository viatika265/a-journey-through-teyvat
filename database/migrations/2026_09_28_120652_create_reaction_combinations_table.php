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
        Schema::create('reaction_combinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reaction_id')
                ->constrained('combat_reactions')
                ->cascadeOnDelete();

            $table->foreignId('element_1_id')
                ->nullable()
                ->constrained('elements')
                ->nullOnDelete();

            $table->foreignId('element_2_id')
                ->nullable()
                ->constrained('elements')
                ->nullOnDelete();

            $table->foreignId('state_1_id')
                ->nullable()
                ->constrained('combat_states')
                ->nullOnDelete();

            $table->foreignId('state_2_id')
                ->nullable()
                ->constrained('combat_states')
                ->nullOnDelete();

            $table->string('trigger_type')->nullable();

            $table->unsignedInteger('order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reaction_combinations');
    }
};
