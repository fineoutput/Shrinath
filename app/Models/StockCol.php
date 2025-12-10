<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockCol extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'tbl_stock_col';
    protected $fillable = [
        'stock_id',
        'name',
        'ticker',
        'exchange',
        'interval_at',
        'time',
        'time_2',
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

    public function Stock()
    {
        return $this->hasOne(Stock::class, 'id', 'stock_id');
    }

}
