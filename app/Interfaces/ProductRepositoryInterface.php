<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function createProduct($request);
    public function updateProduct($id, $request);
    public function deleteProduct($id);

}
