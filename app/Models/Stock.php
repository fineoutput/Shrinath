<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'tbl_stock';
    protected $fillable = [
        'stock_name',
        'stock_1d_name',
        'app_name',
        'sq_number',
        'status',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
