<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\JsonReturn;
use App\Interfaces\ProductRepositoryInterface;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    use JsonReturn;
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;
    }

    public function index(){
        try{
            $products = $this->productRepository->getAllProducts();
            return ($products) ? $this->jsonSuccess(ProductResource::collection($products)) : $this->jsonBadRequest();
        }catch (Exception $e) {
            return $this->jsonBadRequest();
        } 
    }

    public function create(ProductCreateRequest $request){   
        try{
            $product = $this->productRepository->createProduct($request);
            return ($product) ? $this->jsonCreated(new ProductResource($product)) : $this->jsonBadRequest();
        }catch (Exception $e) {
            return $this->jsonBadRequest();
        } 
    }
    public function update(ProductUpdateRequest $request){
        try{
            $updatedProduct = $this->productRepository->updateProduct($request->id, $request);
            return ($updatedProduct) ? $this->jsonSuccess(new ProductResource($updatedProduct)) : $this->jsonBadRequest();
        }catch (Exception $e) {
            return $this->jsonBadRequest();
        }
    }
    public function delete($id){
        try{
            $deleteProduct = $this->productRepository->deleteProduct($id);
            return ($deleteProduct) ? $this->jsonSuccess(new ProductResource($deleteProduct)) : $this->jsonBadRequest();
        }catch (Exception $e) {
            return $this->jsonBadRequest();
        }
        
    }
}
