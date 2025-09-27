<?php

namespace App\Models;

use App\adminmodel\Team;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Products extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'mrp',
        'weight',
        'description',
        'short_description',
        'status',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'video',
        'auth_id',
    ];


    // public function Category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
    public function Team()
    {
        return $this->hasOne(Team::class,'id','auth_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'id','category_id');
    }

  
}
