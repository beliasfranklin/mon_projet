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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->integer('numeroMinistre')->unique();
            $table->dateTime('dateHeureEnvoiMinistre');
            $table->dateTime('dateHeureReceptionMinistre');
            $table->enum('statutDossier',['créé','recu par dep','cote','assigne','en cours','traite','valide','archive','en correction','en instance']);
            $table->integer('numeroDEP')->unique();
            $table->dateTime('dateHeureEnvoiDEP');
            $table->dateTime('dateHeureReceptionDEP');
            $table->integer('numeroCPP')->unique();
            $table->dateTime('dateHeureEnvoiCPP');
            $table->dateTime('dateHeureReceptionCPP');   
            $table->integer('numeroCEI')->unique();
            $table->dateTime('dateHeureEnvoiCEI');
            $table->dateTime('dateHeureReceptionCEI');
            $table->string('instruction');
            $table->string('motifCorrection');
            $table->string('commentaires');
            $table->string('proprietaireActuel');
            $table->enum('typeDossier',['interne','externe']);
            $table->integer('nbreJoursPassesDossiers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
