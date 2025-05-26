<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SniPrice extends Model
{
    protected $fillable = [
        'name', 
        'price',
        'change_type',
        'change_value'
    ];
}

