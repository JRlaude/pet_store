<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //admin controller
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'quantity' => 'required',
        ]);
        $product = new Product();
        $product->category_id = $this->getCategoryId($request->category);
        $product->image = $product->saveImage($request->image);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
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
        $product->category_id = $this->getCategoryId($request->category);
        $product->quantity = $request->quantity;
        if ($request->hasFile('image')) {
            $product->deleteImage($product->image);
            $product->image = $product->saveImage($request->image);
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        //delete data
        $product = Product::find($id);
        if ($product->order_details()->count() > 0) {
            return redirect()->route('products.index')->with('error', 'Product has been ordered');
        }
        $product->deleteImage($product->image);
        if ($product->delete()) {
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        }
    }

    public function getCategoryId($category_name)
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

    //user controller
    public function getProducts()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products.index', compact('products', 'categories'));
    }
    public function getProductByCategory($category_id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $category_id)->get();
        return view('products.index', compact('products', 'categories'));
    }

    public function searchProduct(Request $request)
    {
        $categories = Category::all();
        $search = $request->get('search');
        dd($search);
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('products.index', compact('products', 'categories'));
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        $products = Product::where('category_id', $product->category_id)->get()->except($product->id);
        return view('products.show', compact('product', 'products'));
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
