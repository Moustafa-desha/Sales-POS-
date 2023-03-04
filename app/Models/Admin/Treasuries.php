<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasuries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_master',
        'last_receipt_exchange',
        'last_receipt_collect',
        'com_code',
        'added_by',
        'updated_by',
        'active',
    ];
}
