<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'notification';
    protected $fillable = [
        'title',
        'body',
        'image',
        'product_id',
        'category_id',
        'screen',
        'name',
        'time',
    ];


    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

 


  
}
