<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    //
    protected $table='dossiers';
    protected $fillable=['intitule'	,'numeroMinistre','dateHeureEnvoiMinistre','dateHeureReceptionMinistre','statutDossier','numeroDEP'	,'dateHeureEnvoiDEP','dateHeureReceptionDEP','numeroCPP','dateHeureEnvoiCPP','dateHeureReceptionCPP','numeroCEI','dateHeureEnvoiCEI','dateHeureReceptionCEI','instruction','motifCorrection','commentaires','proprietaireActuel','typeDossier','nbreJoursPassesDossiers','dateEnvoiCourrier','dateReceptionCourrier','priorite','envoyer_par','dateEnvoiUsagerExterne','motifRejet'];
    public $timestamps = true;
}
