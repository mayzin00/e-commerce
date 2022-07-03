<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Helpers\JsonReturn;
use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Requests\ProductCategoryCreateRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;

class ProductCategoryController extends Controller{
    use JsonReturn;

    private ProductCategoryRepositoryInterface $productCategoryRepository;

    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository){
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function index(){   
        try{
            $categories = $this->productCategoryRepository->getAllProductCategories();
            return ($categories) ? $this->jsonSuccess(ProductCategoryResource::collection($categories)) : $this->jsonBadRequest();

        } catch (Exception $e) {
            return $this->jsonBadRequest();
        } 
    }
    
    public function create(ProductCategoryCreateRequest $request){
        try{
            $category = $this->productCategoryRepository->createProductCategory($request);
            return ($category) ? $this->jsonCreated(new ProductCategoryResource($category)) : $this->jsonBadRequest();
        } catch (Exception $e) {
            return $this->jsonBadRequest();
        } 
    }

    public function update(ProductCategoryUpdateRequest $request){   
        try{       
            $updatedCategory = $this->productCategoryRepository->updateProductCategory($request->id, $request);
            return ($updatedCategory) ? $this->jsonSuccess(new ProductCategoryResource($updatedCategory)) : $this->jsonBadRequest();

        } catch (Exception $e) {
            return $this->jsonBadRequest();
        }     
    }

    public function delete($id){   
        try{
            $deleteCategory = $this->productCategoryRepository->deleteProductCategory($id);
            return ($deleteCategory) ? $this->jsonSuccess(new ProductCategoryResource($deleteCategory)) : $this->jsonBadRequest();

        } catch (Exception $e) {
            return $this->jsonBadRequest();
        }      
    }
}
