<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCol extends Model
{
    use HasFactory;
    protected $table = 'tbl_stock_col';
    protected $fillable = [
        'stock_id',
        'name',
        'ticker',
        'exchange',
        'interval_at',
        'time',
        'open',
        'close',
        'high',
        'low',
        'volume',
        'quote',
        'base',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
