<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    //
    public function index()
    {
        $pets = Pet::all();
        return view('admin.pets.index', compact('pets'));
    }
    public function getPets()
{ 
    $pets = Pet::all();
    return view('pets.index', compact('pets'));
}

    public function show($id)
    {
      $pet = Pet::find($id);
        return view('pets.show', compact('pet'));
    }
    public function create()
    {
        return view('pets.create');
    }   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'weight' => 'required', 
            'image' => 'required',
        ]);
        $pet = new Pet([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'breed' => $request->get('breed'),
            'age' => $request->get('age'),
            'weight' => $request->get('weight'),
            'image' => $request->get('image'),
        ]);
        $pet->save();
        return redirect('/pets')->with('success', 'Pet has been added');    

    }

    public function edit($id)
    {
        $pet = Pet::find($id);
        return view('pets.edit', compact('pet'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'weight' => 'required',
            'image' => 'required',
        ]);
        $pet = Pet::find($id);
        $pet->name = $request->get('name');
        $pet->type = $request->get('type');
        $pet->breed = $request->get('breed');
        $pet->age = $request->get('age');
        $pet->weight = $request->get('weight');
        $pet->image = $request->get('image');
        $pet->save();
        return redirect('/pets')->with('success', 'Pet has been updated');


}
public function destroy($id)
{
    $pet = Pet::find($id);
    $pet->delete();
    return redirect('/pets')->with('success', 'Pet has been deleted Successfully');

}
 

public function search(Request $request)
{
    $search = $request->get('search');
    $pets = Pet::where('name', 'like', '%' . $search . '%')->get();
    return view('pets.index', compact('pets'));
}

public function sort(Request $request)
{
    $sort = $request->get('sort');
    $pets = Pet::orderBy('name', $sort)->get();
    return view('pets.index', compact('pets'));
    
}

public function filter(Request $request)
{
    $filter = $request->get('filter');
    $pets = Pet::where('type', $filter)->get();
    return view('pets.index', compact('pets'));
}
}
