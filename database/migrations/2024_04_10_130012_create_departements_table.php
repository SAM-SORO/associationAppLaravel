<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // for ville
        Schema::create('villes', function (Blueprint $table) {
            $table->id();
            $table->string("label");
            $table->unsignedBigInteger("responsable")->nullable();
            $table->foreign('responsable')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        // for section
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string("label");
            $table->unsignedBigInteger("responsable")->nullable();
            $table->foreign('responsable')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger("ville_id")->nullable();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->timestamps();
        });
        // for group
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            $table->string("label");
            $table->unsignedBigInteger("responsable")->nullable();
            $table->foreign('responsable')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger("section_id")->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('groupes');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('villes');
    }
};
