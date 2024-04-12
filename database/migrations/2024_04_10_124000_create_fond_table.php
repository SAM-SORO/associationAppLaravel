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

        Schema::create('fond_specifique', function (Blueprint $table) {
            $table->id();
            $table->string("label");
            $table->integer("montant");
            $table->unsignedBigInteger('auteur')->nullable();
            $table->foreign('auteur')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('periode')->nullable();
            $table->foreign('periode')->references('id')->on('periodes')->onDelete('cascade');

            $table->integer("desc");
            $table->timestamps();
        });

        Schema::create('fond_general', function (Blueprint $table) {
            $table->id();
            $table->string("label");
            $table->integer("montant");
            $table->unsignedBigInteger('auteur')->nullable();
            $table->foreign('auteur')->references('id')->on('users')->onDelete('cascade');
            $table->integer("desc");

            $table->unsignedBigInteger('periode')->nullable();
            $table->foreign('periode')->references('id')->on('periodes')->onDelete('cascade');

            $table->timestamps();
        });

        // adherant à un fond
        Schema::create('fond_membres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fond_id'); // general or specifique
            $table->unsignedBigInteger("membre")->nullable();
            $table->foreign('membre')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->string("mode");
            $table->integer("montant");
            $table->unsignedBigInteger('fond_id'); // general or specifique;
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
        Schema::dropIfExists('fond_general');
        Schema::dropIfExists('fond_specifique');
        Schema::dropIfExists('fond_membres');
        Schema::dropIfExists('periodes');
        Schema::dropIfExists('payements');

    }
};
