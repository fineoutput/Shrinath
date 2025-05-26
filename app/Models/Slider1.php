<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Slider1 extends Model
{
    use HasFactory;

    protected $table = 'slider_1';
    protected $fillable = [
        'title',
        'image',
        'type',
        'status',
    ];


    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

  
}
