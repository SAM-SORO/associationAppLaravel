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
        Schema::table('fonds', function (Blueprint $table) {
            $table->unsignedBigInteger("membre")->nullable();
            $table->foreign('membre')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->unsignedBigInteger("membre")->nullable();
        $table->foreign('membre')->references('id')->on('users')->onDelete('cascade');
    }
};
