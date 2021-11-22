<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function index()
    {
        return view('order_details.index');
    }
    public function create()
    {
        return view('order_details.create');
    }
    public function store(Request $request)
    {
        
        
        
    } 
}
