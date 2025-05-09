<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Depots extends Model
{
    use HasFactory;

    protected $table = 'depots';
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'location',
        'contact_person_name',
        'manager',
        'email',
        'working_hours',
        'status',
    ];


    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

 


  
}
