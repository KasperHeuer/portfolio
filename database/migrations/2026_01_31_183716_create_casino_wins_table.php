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
        Schema::create('casino_wins', function (Blueprint $table) {
            $table->id();
            $table->string('casinoGame');
            $table->integer('AmountPlayed');
            $table->integer('AmountWon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casino_wins_and_losses');
    }
};
