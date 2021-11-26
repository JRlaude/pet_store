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
        $category->description = $request->description;
        $category->save();
        return redirect('/category');
    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {   
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {       
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect('/category');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category');
    }   

}
