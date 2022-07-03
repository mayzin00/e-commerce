<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Carbon\Carbon;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAllProducts(){
       return Product::all();
    }

    public function createProduct($request){
        $data = $request->except('image');
        if ($request->file('image')) {
            $file= $request->file('image');
            $filename = Carbon::now()->format('Y-m-d-H:i:s') . "_". $file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image'] = $filename;
        }
        return Product::create($data);
    }

    public function updateProduct($id, $request)
    {   
        $product = Product::find($id);
        $data = $request->except('id');
        
        if ($request->file('image')) {
            $file= $request->file('image');
            $filename = Carbon::now()->format('Y-m-d H:i:s') . "_". $file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image'] = $filename;
        }

        return $product ? tap($product)->update($data) : null;
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        return $product ? tap($product)->delete() : null;
    }
}
