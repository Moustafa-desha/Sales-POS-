<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasuries_Delivery extends Model
{
    use HasFactory;

    protected $table = "treasuries_delivery";

    protected $fillable = [
        'treasuries_id',
        'treasuries_can_delivery_id',
        'com_code',
        'added_by',
        'updated_by',

    ];

}
