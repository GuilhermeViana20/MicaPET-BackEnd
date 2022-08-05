<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::orderBy('id','desc')->paginate(5);
        return view('categories.index', $data);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'active' => 'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->active = $request->active;
        $category->save();

        return redirect()->route('categories.index')
            ->with('success','Category has been created successfully.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'active' => 'required'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->active = $request->active;
        $category->save();

        return redirect()->route('categories.index')
            ->with('success','Category Has Been updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success','Category has been deleted successfully');
    }
}
