<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Product category created successfully');
    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.categories.show', compact('category'));
    }

    public function edit($id)
    {   
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Product category updated successfully');

    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Product category Deleted successfully');;
    }   

}
