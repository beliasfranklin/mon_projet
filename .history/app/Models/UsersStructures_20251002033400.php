<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersStructures extends Model
{
    //
    protected $table = 'users_structures';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'structure_id'];
    public $timestamps = true;

}
