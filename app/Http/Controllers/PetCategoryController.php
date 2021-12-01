<?php

namespace App\Http\Controllers;

use App\PetCategory;
use Illuminate\Http\Request;

class PetCategoryController extends Controller
{
    public function index()
    {
        $pet_categories = PetCategory::all();
        return view('admin.pet_categories.index', compact('pet_categories'));
    }
    public function create()
    {
        return view('admin.pet_categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pet_categories|max:255',
        ]);
        $pet_category = new PetCategory;
        $pet_category->name = $request->name;
        $pet_category->save();
        return redirect()->back()->with('success', 'Pet category created successfully');
    }
    public function edit($id)
    {
        $pet_category = PetCategory::find($id);
        return view('admin.pet_categories.edit', compact('pet_category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $pet_category = PetCategory::find($id);
        $pet_category->name = $request->name;
        $pet_category->save();
        return redirect()->route('pet_categories.index')->with('success', 'Product category updated successfully');
    }
    public function destroy($id)
    {
        $pet_category = PetCategory::find($id);

        if ($pet_category->pets()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot Delete Pet Category because of assiociated pet(s)');
        }
        $pet_category->delete();
        return redirect()->back()->with('success', 'Pet category Deleted successfully');
    }

}
