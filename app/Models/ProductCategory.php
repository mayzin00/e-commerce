<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class ProductCategory extends Model
{
    protected $table = 'product_categories';

    protected $fillable = [
        'id', 'name'
    ];

    public  function product(){
        return $this->hasMany('App\Models\Product', 'category_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
