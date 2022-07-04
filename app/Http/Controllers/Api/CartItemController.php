<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Helpers\JsonReturn;
use App\Interfaces\CartItemRepositoryInterface;
use App\Http\Resources\CardItemResource;
use App\Http\Requests\CartItemCreateRequest;
use App\Http\Requests\CartItemUpdateRequest;

class CartItemController extends Controller
{
    use JsonReturn;
    private CartItemRepositoryInterface $cartItemRepository;

    public function __construct(CartItemRepositoryInterface $cartItemRepository){
        $this->cartItemRepository = $cartItemRepository;
    }

    public function index(){
        try{
            $cartItems = $this->cartItemRepository->getAllCartItems();
            return ($cartItems) ? $this->jsonSuccess(CardItemResource::collection($cartItems)) : $this->jsonBadRequest();
        }catch (Exception $e) {
            return $this->jsonBadRequest();
        } 
    }
    public function store(CartItemCreateRequest $request){
        try{
            $cartItems = $this->cartItemRepository->createCartItem($request);
            return ($cartItems) ? $this->jsonCreated(new CardItemResource($cartItems)) : $this->jsonBadRequest();
        }catch (Exception $e) {
            return $this->jsonBadRequest();
        } 
    }
    public function update(CartItemUpdateRequest $request, $id){
        try{
            $updatedCartItem = $this->cartItemRepository->updateCartItem($id, $request);
            return ($updatedCartItem) ? $this->jsonSuccess(new CardItemResource($updatedCartItem)) : $this->jsonBadRequest();   
        }catch (Exception $e) {
            return $this->jsonBadRequest();
        }  
    }

    public function destroy($id){
        try{
            $deleteCartItem = $this->cartItemRepository->deleteCartItem($id);
            return ($deleteCartItem) ? $this->jsonSuccess(new CardItemResource($deleteCartItem)) : $this->jsonBadRequest();
        }catch (Exception $e) {
            return $this->jsonBadRequest();
        }
    }
}
