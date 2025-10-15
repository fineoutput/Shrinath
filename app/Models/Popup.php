<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    protected $table = 'popup_images';
    protected $fillable = [
        'image', 
        'status',
    ];
}

