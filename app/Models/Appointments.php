<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable = [
        'name', 
        'email',
        'phone',
        'preferred_date',
        'preferred_time',
        'message',
        'status',
    ];

}
