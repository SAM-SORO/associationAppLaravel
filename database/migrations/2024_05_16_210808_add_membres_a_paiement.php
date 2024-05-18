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
        Schema::table('paiements', function (Blueprint $table) {
            $table->unsignedBigInteger('membre')->nullable();
            $table->foreign('membre')->references('id')->on('membres')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->unsignedBigInteger('membre')->nullable();
            $table->foreign('membre')->references('id')->on('membres')->onDelete('cascade');
        });
    }
};
