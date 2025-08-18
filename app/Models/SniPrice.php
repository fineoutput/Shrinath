<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SniPrice extends Model
{
    protected $fillable = [
        'name', 
        'price',
        'current_price',
        'change_type',
        'change_value'
    ];
}

