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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->integer('bicycle_id');
            $table->foreign('bicycle_id')->references('id')->on('bicycles');
            $table->date('rental_date');
            $table->date('return_date');     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};