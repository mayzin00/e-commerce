<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'price', 'name', 'category_id', 'image'
    ];

    public function productCategory(){
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }

    public function getPriceAttribute($value){
        return $value / 100;
    }

    public function setPriceAttribute($value){
        $this->attributes['price'] = $value * 100;
    }
    
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
