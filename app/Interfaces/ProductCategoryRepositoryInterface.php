<?php

namespace App\Interfaces;

interface ProductCategoryRepositoryInterface
{
    public function getAllProductCategories();
    public function createProductCategory($request);
    public function updateProductCategory($id, $request);
    public function deleteProductCategory($id);
}
