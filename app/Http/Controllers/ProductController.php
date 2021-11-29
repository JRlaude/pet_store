<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function getProducts()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $this->category($request->category);
        $product->quantity = $request->quantity;
        $product->img = $this->image($request->image);
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show($id)
    {
        //show data
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        //edit data
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'quantity' => 'required',

        ]);

        //update data
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $this->category($request->category);
        $product->quantity = $request->quantity;
        if ($request->hasFile('image')) {
            if ($product->img) {
                Storage::delete('/public/images/products/' . $product->img);
            }
            $product->img = $this->image($request->image);
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        //delete data
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function category($category_name)
    {
        $category = Category::where('name', $category_name)->first();
        if ($category) {
            return $category->id;
        } else {
            $category = new Category();
            $category->name = $category_name;
            $category->save();
            return $category->id;
        }
    }
    public function image($image)
    {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('images/products', $imageName, 'public');
        return $imageName;
    }
    // public function addToCart(Request $request, $id)
    // {
    //     $product = Product::find($id);
    //     $oldCart = Session('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($product, $product->id);
    //     $request->session()->put('cart', $cart);
    //     return redirect()->back();
    // }
    // public function getCart()
    // {
    //     if (!Session::has('cart')) {
    //         return view('cart.index', ['products' => null]);
    //     }
    //     $oldCart = Session::get('cart');
    //     $cart = new Cart($oldCart);
    // }
    // public function getCheckout()
    // {
    //     if (!Session::has('cart')) {
    //         return view('cart.index', ['products' => null]);
    //     }
    //     $oldCart = Session::get('cart');
    //     $cart = new Cart($oldCart);
    //     $total = $cart->totalPrice;
    //     return view('cart.checkout', ['total' => $total]);
    // }
    // public function postCheckout(Request $request)
    // {
    //     if (!Session::has('cart')) {
    //         return redirect()->route('shop.shoppingCart');
    //     }
    //     $oldCart = Session::get('cart');
    //     $cart = new Cart($oldCart);
    //     $total = $cart->totalPrice;
    //     $order = new Order();
    //     $order->cart = serialize($cart);
    //     $order->address = $request->input('address');
    //     $order->name = $request->input('name');
    //     $order->payment_id = $request->input('payment_id');
    //     $order->total = $total;
    //     $order->save();
    //     Session::forget('cart');
    //     return redirect()->route('shop.index');
    // }
    // public function getOrders()
    // {
    //     $orders = Order::all();
    //     return view('admin.orders.index', compact('orders'));
    // }
    // public function getOrder($id)
    // {
    //     $order = Order::find($id);
    //     return view('admin.orders.show', compact('order'));
    // }
    // public function getInvoice($id)
    // {
    //     $order = Order::find($id);
    //     $pdf = PDF::loadView('admin.orders.invoice', compact('order'));
    //     return $pdf->download('invoice.pdf');
    // }

}
