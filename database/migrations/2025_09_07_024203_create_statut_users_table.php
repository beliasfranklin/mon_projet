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
        Schema::create('statut_users', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->enum('statut',['inactif','disponible','occupé','surchage','en conge','suspendu'])->default('inactif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statut_users');
    }
};
