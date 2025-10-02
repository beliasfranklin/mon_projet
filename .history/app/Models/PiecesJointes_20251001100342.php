<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PiecesJointes extends Model
{
    //
    protected $table = 'pieces_jointes';
    protected $fillable=['nom','chemin','idDossier'];
    public $timestamps = true;
}
