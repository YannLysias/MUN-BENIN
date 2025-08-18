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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('telephone');
            $table->string('type');
            $table->string('profession');
            $table->string('statut');
            $table->string('photo')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('npi')->unique()->nullable();
            $table->string('ravip')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('titre_id')->constrained()->nullable();
            $table->foreignId('quartier_id')->constrained()->nullable();
            $table->foreignId('arrondissement_id')->constrained()->nullable();
            $table->foreignId('departement_id')->constrained()->nullable();
            $table->foreignId('commune_id')->constrained()->nullable();
            $table->foreignId('circonscription_id')->constrained()->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
