<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    public function create ()
    {
        return view('backend.product.create', [
            'categories' => Category::where('status', 1)->get(),
        ]);
    }

    public function store (Request $request)
    {
        Product::createProduct($request);
        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function index ()
    {
        return view('backend.product.index', [
            'products'  => Product::all()
        ]);
    }

    public function destroy ($id)
    {
        $this->product = Product::find($id);
        if (file_exists($this->product->image))
        {
            unlink($this->product->image);
        }
        $this->product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully.');
    }

    public function edit ($id)
    {
        return view('backend.product.edit', [
            'product' => Product::find($id),
            'categories'    => Category::where('status', 1)->get(),
        ]);
    }

    public function update (Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/manage-product')->with('success', 'Product updated successfully');
    }
}
