<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $table = 'user_roles';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'id_role'];
    public $timestamps = false;

}
