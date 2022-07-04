<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CartItem extends Model
{
    protected $table = 'cart_items';

    protected $fillable = [
        'product_id'
    ];
    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
