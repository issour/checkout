<?php

namespace R64\Checkout\Http\Controllers;

use R64\Checkout\Http\Requests\CartRequest;
use R64\Checkout\Http\Resources\CartResource;
use R64\Checkout\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /***************************************************************************************
     ** GET
     ***************************************************************************************/
    public function get(Cart $cart)
    {
        return $this->success(new CartResource($cart->load('cartItems')));
    }

    /***************************************************************************************
     ** POST
     ***************************************************************************************/
    public function create(CartRequest $request)
    {
        $cart = Cart::makeOne([
            'user_id' => auth()->user()->id ?? null,
            'ip_address' => $request->ip(),
            'product_id' => $request->get('product_id')
        ]);

        return $this->success(new CartResource($cart->fresh()->load('cartItems')));
    }

    /***************************************************************************************
     ** PUT
     ***************************************************************************************/
    public function update(Cart $cart, Request $request)
    {
        $cart->updateMe($request->only('discount_code'));

        return $this->success(new CartResource($cart->load('cartItems')));
    }

    /***************************************************************************************
     ** DELETE
     ***************************************************************************************/
    public function delete(Cart $cart)
    {
        $cart->delete();

        return $this->success();
    }
}
