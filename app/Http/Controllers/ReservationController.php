<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (auth()->user()->isAdmin) { 
            $reservations = Reservation::all();
            return view('admin.reservations.index', compact('reservations'));
        } else {
            $reservations = auth()->user()->reservations;
            return view('reservations.index', compact('reservations'));
        }
     
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
        ]);
        $reservation = new Reservation;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->user_id = auth()->user()->id;
        $reservation->pet_id = $request->pet_id;
        $reservation->save();
        return redirect()->back()->with('success', 'Thanks for your reservation');
    }

    public function show($id)
    {
        //
        $reservation = Reservation::find($id);
        return view('reservation.show', compact('reservation'));
    }
    public function destroy($id)
    {
        //
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation Deleted');
    }
    public function edit($id)
    {
        //
        $reservation = Reservation::find($id);
        return view('reservation.edit', compact('reservation'));
    }
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
        ]);
        $reservation = Reservation::find($id);
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->save();
        return redirect()->route('reservation.index')->with('success', 'Reservation Updated');
    }
    public function getReservation()
    {
        $reservations = Reservation::where('user_id', auth()->user()->id)->get();
        return view('reservation.index', compact('reservations'));
    }
}
