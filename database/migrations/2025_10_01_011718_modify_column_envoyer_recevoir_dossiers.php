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
        Schema::table('envoyer_recevoir_dossiers', function (Blueprint $table) {
            //
            $table->integer('id_expediteur')->after('id');
            $table->integer('id_destinataire')->after('id_expediteur');
            $table->dropColumn('id_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('envoyer_recevoir_dossiers', function (Blueprint $table) {
            //
        });
    }
};
