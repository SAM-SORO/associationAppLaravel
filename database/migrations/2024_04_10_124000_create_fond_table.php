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

        Schema::create('fonds', function (Blueprint $table) {
            $table->id();
            $table->string("label");
            $table->string("departement_nom");
            $table->integer("montant");
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->unsignedBigInteger('auteur')->nullable();
            $table->foreign('auteur')->references('id')->on('users')->onDelete('cascade');
            $table->text("description");

            $table->date('debut');
            $table->date('fin');

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

            $table->unsignedBigInteger('fonds')->nullable();
            $table->foreign('fonds')->references('id')->on('fonds')->onDelete('cascade');

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
        Schema::dropIfExists('payements');

    }
};
