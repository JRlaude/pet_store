<?php

namespace App\Http\Controllers;

use App\PetCategory;
use Illuminate\Http\Request;

class PetCategoryController extends Controller
{
    public function index()
    {
        return view('pet_category.index');
    }
    public function create()
    {
        return view('pet_category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pet_categories|max:255',
        ]);
        $pet_category = new PetCategory;
        $pet_category->name = $request->name;
        $pet_category->save();
        return redirect('/pet_category');
    }
    public function show($id)
    {
        $pet_category = PetCategory::find($id);
        return view('pet_category.show', compact('pet_category'));
    }
    public function edit($id)
    {
        $pet_category = PetCategory::find($id);
        return view('pet_category.edit', compact('pet_category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $pet_category = PetCategory::find($id);
        $pet_category->name = $request->name;
        $pet_category->save();
        return redirect('/pet_category');
    }
    public function destroy($id)
    {
        $pet_category = PetCategory::find($id);
        $pet_category->delete();
        return redirect('/pet_category');
    }
    public function pet_category_list()
    {
        $pet_categories = PetCategory::all();
        return view('pet_category.pet_category_list', compact('pet_categories'));
    }
    
}
