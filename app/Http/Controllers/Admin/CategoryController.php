<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function create()
    {
        return view('backend.category.create');
    }
    public function store(Request $request)
    {
        Category::createCategory($request);
        return redirect()->back()->with('success', 'Category Created Successfully');
    }

    public function index ()
    {
        return view('backend.category.index', [
            'categories'    => Category::all()
        ]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('backend.category.edit', ['category' => $this->category]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy ($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted successfully');
    }
}
