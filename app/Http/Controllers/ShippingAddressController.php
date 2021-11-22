<?php

namespace App\Http\Controllers;

use App\ShippingAddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    public function index()
    {
        return view('shipping-address');
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'phone' => 'required',
        ]);
        //
        $shippingAddress = new ShippingAddress();
        $shippingAddress->first_name = $request->first_name;
        $shippingAddress->last_name = $request->last_name;
        $shippingAddress->address = $request->address;
        $shippingAddress->city = $request->city;
        $shippingAddress->state = $request->state;
        $shippingAddress->zip = $request->zip;
        $shippingAddress->country = $request->country;
        $shippingAddress->phone = $request->phone;
        $shippingAddress->save();
        return redirect('/shipping-address')->with('success', 'Shipping Address Added');

    }
    public function edit($id)
    {
        $shippingAddress = ShippingAddress::find($id);
        return view('shipping-address', compact('shippingAddress'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'phone' => 'required',
        ]);
        //
        $shippingAddress = ShippingAddress::find($id);
        $shippingAddress->first_name = $request->first_name;
        $shippingAddress->last_name = $request->last_name;
        $shippingAddress->address = $request->address;
        $shippingAddress->city = $request->city;
        $shippingAddress->state = $request->state;
        $shippingAddress->zip = $request->zip;
        $shippingAddress->country = $request->country;
        $shippingAddress->phone = $request->phone;
        $shippingAddress->save();
        return redirect('/shipping-address')->with('success', 'Shipping Address Updated');
    }
    public function destroy($id)
    {
        $shippingAddress = ShippingAddress::find($id);
        $shippingAddress->delete();
        return redirect('/shipping-address')->with('success', 'Shipping Address Deleted');
    }
    public function getShippingAddress()
    {
        $shippingAddress = ShippingAddress::all();
        return response()->json($shippingAddress);
    }
    public function getShippingAddressById($id)
    {
        $shippingAddress = ShippingAddress::find($id);
        return response()->json($shippingAddress);
    }
    public function getShippingAddressByUserId($id)
    {
        $shippingAddress = ShippingAddress::where('user_id', $id)->get();
        return response()->json($shippingAddress);
    }
}
