<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatutConnexion extends Model
{
    //
    protected $table = 'statut_connexions';
    protected $fillable = ['id_user', 'estConnecte'];  
    public $timestamps = true;

}
