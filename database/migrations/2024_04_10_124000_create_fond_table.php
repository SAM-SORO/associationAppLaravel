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

        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fonds')->constrained('fonds')->onDelete('cascade');
            $table->integer('montant', 8, 2);
            $table->timestamp('date_paiement')->useCurrent();
            $table->text('mode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonds');
        Schema::dropIfExists('paiements');

    }
};
