<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('penny_trackers', function (Blueprint $table) {
            $table->id();
            $table->string('unique_identifier')->unique();
            $table->foreignId('donation_id')->constrained();
            $table->foreignId('charity_id')->constrained();
            $table->decimal('amount', 8, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penny_trackers');
    }
};
