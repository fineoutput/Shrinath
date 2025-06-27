<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class UnverifyVendor extends Model
{
    use HasFactory;

    protected $table = 'unverify_vendor';
    protected $fillable = [
        'name',
        'business_name',
        'phone_no',
        'email',
        'depot_id',
        'state_id',
        'city_id',
        'gst_no',
        'status',
    ];


    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function depots()
    {
        return $this->hasOne(Depots::class, 'id', 'depot_id');
    }


  
}
