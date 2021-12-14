<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\ShippingAddress;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        if (auth()->user()->isAdmin) {
            $orders = Order::all();
            foreach ($orders as $order) {
                $order->products = json_decode($order->products);
            }
            return view('admin.orders.index', compact('orders'));
        } else {
            $orders = auth()->user()->orders;
            foreach ($orders as $order) {
                $order->products = json_decode($order->products);
            }
            return view('orders.index', compact('orders'));
        }
    }
    public function buynow(Product $product)
    {
        $shippingFee = 50;
        $finalTotal = $product->price + $shippingFee;
        $shippingAddress = auth()->user()->shipping_addresses->last();
        return view('orders.buynow', compact('product', 'shippingFee', 'finalTotal', 'shippingAddress'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'brgy' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',

        ]);
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $product = Product::find($request->product_id);
        $order->products = array(
            '1' =>  array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(
                    'image' => $product->image,
                ),
            )
        );
        $order->products = json_encode($order->products);
        $order->shipping_address = $request->houseNumber . ' ' . $request->street . ' ' . $request->brgy . ' ' . $request->city . ' ' . $request->province  . ' ' . $request->country;
        $order->subTotal = $product->price;
        $shippingFee = 50;
        $order->shippingFee = $shippingFee;
        $order->total = $product->price + $shippingFee;
        $order->save();

        if ($request->saveInfo) {
            $shippingAddress = new ShippingAddress();
            $shippingAddress->user_id = auth()->id();
            $shippingAddress->houseNumber = $request->houseNumber;
            $shippingAddress->street = $request->street;
            $shippingAddress->brgy = $request->brgy;
            $shippingAddress->city = $request->city;
            $shippingAddress->province = $request->province;
            $shippingAddress->country = $request->country;
            $shippingAddress->save();
        }
        return redirect()->route('orders.index')->with('success', 'Order has been placed successfully!');
    }
    public function show(Order $order)
    {
        $order->products = json_decode($order->products);
        if (auth()->user()->isAdmin) {
            return view('admin.orders.show', compact('order'));
        }
        if (auth()->user()->id == $order->user_id) {
            return view('orders.show', compact('order'));
        } else {
            return redirect()->route('orders.index')->with('error', 'You are not authorized to view this order!');
        }
    }

    public function cancelOrder(Order $order)
    {
        if (auth()->user()->id == $order->user_id) {
            if ($order->status == 'pending') {
                $order->status = 'cancelled';
                $order->save();
                return redirect()->route('orders.index')->with('success', 'Order has been cancelled successfully!');
            } else {
                return redirect()->route('orders.index')->with('error', 'You cannot cancel this order!');
            }
        } else {
            return redirect()->route('orders.index')->with('error', 'You are not authorized to cancel this order!');
        }
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'card_number' => 'required',
            'card_name' => 'required',
            'card_expiration' => 'required',
            'card_cvv' => 'required',
        ]);

        $order = Order::find($id);
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip = $request->zip;
        $order->card_number = $request->card_number;
        $order->card_name = $request->card_name;
        $order->card_expiration = $request->card_expiration;
        $order->card_cvv = $request->card_cvv;
        $order->save();

        return redirect('/order/' . $id)->with('success', 'Order updated successfully!');
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/order')->with('success', 'Order deleted successfully!');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $orders = Order::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('order.index', compact('orders'));
    }
}
