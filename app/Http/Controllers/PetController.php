<?php

namespace App\Http\Controllers;

use App\Pet;
use App\PetCategory;
use Illuminate\Http\Request;

class PetController extends Controller
{
    //
    public function index()
    {
        $pets = Pet::all();
        return view('admin.pets.index', compact('pets'));
    }
    public function show($id)
    {
        $pet = Pet::find($id);
        return view('admin.pets.show', compact('pet'));
    }
    public function create()
    {
        $pet_categories = PetCategory::all();
        return view('admin.pets.create', compact('pet_categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pet_category' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ]);
        $pet = new Pet();
        $pet->pet_category_id = $this->getPetCategoryId($request->pet_category);
        $pet->image = $pet->saveImage($request->image);
        $pet->name = $request->name;
        $pet->description = $request->description;
        $pet->price = $request->price;
        $pet->save();
        return redirect()->back()->with('success', 'Pet added successfully');
    }

    public function edit($id)
    {
        $pet = Pet::find($id);
        $pet_categories = PetCategory::all();
        return view('admin.pets.edit', compact('pet', 'pet_categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'pet_category' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $pet = Pet::find($id);
        $pet->pet_category_id = $this->getPetCategoryId($request->pet_category);
        $pet->name = $request->name;
        $pet->description = $request->description;
        $pet->price = $request->price;
        if ($request->hasFile('image')) {
            $pet->deleteImage($pet->image);
            $pet->image = $pet->saveImage($request->image);
        }

        $pet->save();
        return redirect()->route('pets.index')->with('success', 'Pet has been updated');
    }
    public function destroy($id)
    {
        $pet = Pet::find($id);
        if ($pet->reservations()->count() > 0) {
            return redirect()->route('pets.index')->with('error', 'Pet has been reserved');
        }
        $pet->deleteImage($pet->image);
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet has been deleted Successfully');
    }

    public function getPetCategoryId($pet_category_name)
    {
        $pet_category = PetCategory::where('name', $pet_category_name)->first();
        if ($pet_category) {
            return $pet_category->id;
        } else {
            $pet_category = new PetCategory();
            $pet_category->name = $pet_category_name;
            $pet_category->save();
            return $pet_category->id;
        }
    }
    public function getPets()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
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
