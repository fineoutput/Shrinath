<?php


namespace App\Models;

use App\adminmodel\Team;
use Illuminate\Database\Eloquent\Model;

class EditProduct extends Model
{
    protected $table = 'edit_product';
    protected $fillable = [
        'auth_user_id', 
        'date',
        'product_id',
    ];

    public function user(){
        return $this->belongsTo(Team::class,'auth_user_id','id');
    }
    

}

