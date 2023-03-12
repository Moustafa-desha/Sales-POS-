<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_Matiral_types extends Model
{
    use HasFactory;

    protected $table = "sales_matiral_types";


    protected $fillable = [
        'name',
        'active',
        'com_code',
        'added_by',
        'updated_by',
    ];
}
