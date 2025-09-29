<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersStructures extends Model
{
    //
    protected $table = 'users_structures';
    protected $fillable = ['id_user', 'structure_id'];
    public $timestamps = true;

}
