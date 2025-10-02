<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnvoyerRecevoirDossier extends Model
{
    //
    protected $table='envoyer_recevoir_dossiers';
    protected $fillable=['id_expediteur','id_destinataire','id_dossier'];
}
