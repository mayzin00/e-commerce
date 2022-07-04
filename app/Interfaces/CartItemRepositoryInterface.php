<?php

namespace App\Interfaces;

interface CartItemRepositoryInterface
{
    public function getAllCartItems();
    public function createCartItem($request);
    public function updateCartItem($id, $request);
    public function deleteCartItem($id);

}
