<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        
        $products = \Cart::session(auth()->id())->getContent()->sortBy('id');
        $shipping = 50;
        $cartSubTotal = \Cart::session(auth()->id())->getSubtotal();
        $cartFinalTotal = $cartSubTotal + $shipping;

        $data = [
            'products' => $products,
            'cartSubTotal' => $cartSubTotal,
            'cartFinalTotal' => $cartFinalTotal,
            'shippingFee' => $shipping,
        ]; 
        return view('carts.index')->with($data);
    }

    public function add(Product $product)
    {
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $product->image,
            ),
        ));
        // return redirect()->back();
        return redirect(route('carts.index'))->with('success','An item successfully added to cart');
    }
 
    public function update(Request $request, Product $product)
    {
        \Cart::session(auth()->user()->id)->update($product->id,[
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            )
        ]);
        return redirect(route('carts.index'))->with('success', 'An item quantity has been updated successfuly');
       
    }

    public function remove(Product $product){
        \Cart::session(auth()->id())->remove($product->id);
        return redirect(route('carts.index'))->with('success', 'A cart item has been removed successfully');
    }
}
