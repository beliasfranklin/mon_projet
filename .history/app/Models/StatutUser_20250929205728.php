<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatutUser extends Model
{
    //
    protected $table = 'statut_users';
    protected $fillable = [
        'statut'
    ];
    public $timestamps = true;

}
