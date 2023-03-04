<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $guard = 'admin';


    protected $fillable = [
        'name',
        'email',
        'password',
        'user_name',
        'added_by',
        'updated_by',
        'com_code',
        'photo',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
