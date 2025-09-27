<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = [
        'category_name',
        'image',
        'description',
        'status',
    ];


    public function products()
    {
        return $this->belongsToMany(Products::class, 'category_product');
    }


  
}
