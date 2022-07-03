<?php

namespace App\Repositories;

use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface{

	public function getAllProductCategories(){
        return ProductCategory::all();
    }

    public function createProductCategory($request){
        return ProductCategory::create($request->all());
    }

    public function updateProductCategory($id, $request){
        $productCategory = ProductCategory::find($id);
        $data = $request->except('id');
        return $productCategory ? tap($productCategory)->update($data) : null;
    }
    public function deleteProductCategory($id){
        $productCategory = ProductCategory::find($id);
        return $productCategory ? tap($productCategory)->delete() : null;
    }
}