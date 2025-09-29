<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NumeroTelephone extends Model
{
    //
    protected $table = 'numero_telephones';
    protected $fillable = ['id_user', 'numeroTelephone'];
    public $timestamps = true;

}
