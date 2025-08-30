<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'block';
    protected $fillable = [
        'title', 
        'description',
        'image',
        'video',
        'profile_image',
    ];
}

