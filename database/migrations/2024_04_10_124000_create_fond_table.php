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
        Schema::create('periodes', function (Blueprint $table) {
            $table->id();
            $table->string("label");
            $table->timestamps();
            $table->date("date_deb");
            $table->date("date_fin");

        });

        Schema::create('fonds', function (Blueprint $table) {
            $table->id();
            $table->string("label");
            $table->string("departement");
            $table->integer("montant");
            $table->unsignedBigInteger('auteur')->nullable();
            $table->foreign('auteur')->references('id')->on('users')->onDelete('cascade');
            $table->integer("desc");

            $table->unsignedBigInteger('periode')->nullable();
            $table->foreign('periode')->references('id')->on('periodes')->onDelete('cascade');

            $table->timestamps();
        });

        // adherant à un fond
        Schema::create('fonds_membres', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fonds'); 
            $table->foreign('fonds')->references('id')->on('fonds')->onDelete('cascade');

            $table->timestamps();
        });


        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->string("mode");
            $table->integer("montant");

            $table->unsignedBigInteger('fonds'); // general or specifique;
            $table->foreign('fonds')->references('id')->on('fonds')->onDelete('cascade');

            $table->unsignedBigInteger("periode")->nullable();
            $table->foreign('periode')->references('id')->on('periodes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonds');
        Schema::dropIfExists('fond_membres');
        Schema::dropIfExists('periodes');
        Schema::dropIfExists('payements');

    }
};
