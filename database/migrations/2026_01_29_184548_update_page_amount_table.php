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
        // First, convert amount to integer
        Schema::table('page_amount', function (Blueprint $table) {
            // If your DB supports it, use change() to modify column type
            $table->integer('amount')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_amount', function (Blueprint $table) {
            $table->string('amount')->change();
        });
    }
};
