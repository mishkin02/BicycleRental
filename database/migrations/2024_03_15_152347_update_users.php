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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 32)->nullable();
            $table->string('last_name', 32)->nullable();
            $table->string('phone_number', 18)->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('first_name', 32);
                $table->dropColumn('last_name', 32);
                $table->dropColumn('phone_number', 18);
            });
    }
};
