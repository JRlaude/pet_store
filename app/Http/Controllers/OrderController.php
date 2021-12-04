<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        if(auth()->user()->isAdmin){
            $orders = Order::all();
            return view('admin.orders.index', compact('orders'));
        }else{
            $orders = auth()->user()->orders; 
            return view('orders.index', compact('orders')); 
        }
       
    }
    public function create()
    {
        return view('order.create');
    }
    public function store(Request $request)
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

        $order = new Order();
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

        return redirect('/order/create')->with('success', 'Order placed successfully!');
    }
    public function show($id)
    {
        $order = Order::find($id);
        return view('order.show', compact('order'));
    }
    public function edit($id)
    {
        $order = Order::find($id);
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
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/order')->with('success', 'Order deleted successfully!');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $orders = Order::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('order.index', compact('orders'));
    }
    public function searchByDate(Request $request)
    {
        $search = $request->get('search');
        $orders = Order::where('created_at', 'like', '%' . $search . '%')->paginate(5);
        return view('order.index', compact('orders'));
    }
    public function searchByEmail(Request $request)
    {
        $search = $request->get('search');
        $orders = Order::where('email', 'like', '%' . $search . '%')->paginate(5);
        return view('order.index', compact('orders'));
    }

    public function searchByAddress(Request $request)
    {
        $search = $request->get('search');
        $orders = Order::where('address', 'like', '%' . $search . '%')->paginate(5);
        return view('order.index', compact('orders'));
    }
    public function searchByCity(Request $request)
    {
        $search = $request->get('search');
        $orders = Order::where('city', 'like', '%' . $search . '%')->paginate(5);
        return view('order.index', compact('orders'));
    }
    public function searchByState(Request $request)
    {
        $search = $request->get('search');
        $orders = Order::where('state', 'like', '%' . $search . '%')->paginate(5);
        return view('order.index', compact('orders'));
    }
    public function searchByZip(Request $request)
    {
        $search = $request->get('search');
        $orders = Order::where('zip', 'like', '%' . $search . '%')->paginate(5);
        return view('order.index', compact('orders'));
    }
}
