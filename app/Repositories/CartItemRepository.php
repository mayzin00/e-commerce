<?php

namespace App\Repositories;

use App\Interfaces\CartItemRepositoryInterface;
use App\Models\CartItem;

class CartItemRepository implements CartItemRepositoryInterface
{
    public function getAllCartItems(){
        return CartItem::all();
    }

    public function createCartItem($request){
        return CartItem::create($request->all());
    }

    public function updateCartItem($id, $request){
        $cartItem = CartItem::find($id);
        $data = $request->except('id');
        return $cartItem ? tap($cartItem)->update($data) : null;
    }

    public function deleteCartItem($id){
        $cartItem = CartItem::find($id);
        return $cartItem ? tap($cartItem)->delete() : null;
    }
}
