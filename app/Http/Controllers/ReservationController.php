<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation.index');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);
        $resevation = new Reservation;
        $resevation->name = $request->name;
        $resevation->email = $request->email;
        $resevation->phone = $request->phone;
        $resevation->message = $request->message;
        $resevation->save();
        return redirect()->back()->with('success', 'Thanks for your reservation');
    }

    public function show($id)
    {
        //
        $resevation = Reservation::find($id);
        return view('reservation.show', compact('resevation'));

    }
    public function destroy($id)
    {
        //
        $resevation = Reservation::find($id);
        $resevation->delete();
        return redirect()->back()->with('success', 'Reservation Deleted');
    }
    public function edit($id)
    {
        //
        $resevation = Reservation::find($id);
        return view('reservation.edit', compact('resevation'));
    }
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);
        $resevation = Reservation::find($id);
        $resevation->name = $request->name;
        $resevation->email = $request->email;
        $resevation->phone = $request->phone;
        $resevation->message = $request->message;
        $resevation->save();
        return redirect()->route('reservation.index')->with('success', 'Reservation Updated');
    }
    public function getReservation()
    {
        $resevations = Reservation::all();
        return view('reservation.index', compact('resevations'));
    }
    // public function getReservationData()
    // {
    //     $resevations = Reservation::all();
    //     return datatables()->of($resevations)
    //         ->addColumn('action', function ($resevations) {
    //             return '<a href="' . route('reservation.show', $resevations->id) . '" class="btn btn-primary btn-sm">View</a>
    //             <a href="' . route('reservation.edit', $resevations->id) . '" class="btn btn-warning btn-sm">Edit</a>
    //             <a href="' . route('reservation.destroy', $resevations->id) . '" class="btn btn-danger btn-sm">Delete</a>';
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }
  

}
