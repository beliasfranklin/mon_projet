<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $table = 'user_roles';
    protected $fillable = ['id_user', 'id_role'];
    public $timestamps = true;

}
