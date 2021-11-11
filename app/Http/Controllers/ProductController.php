<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        if ($image = $request->file('image')) {
            $new_imageName  = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $new_imageName);
        }
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $new_imageName
        ]);
        return redirect()->route('products.index')->with('msg', 'Product is inserted Successfully');
    }

    public function edit($id)
    {
        $product = Product::findorfail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        $input = $request->all();
        if ($image = $request->file('image')) {
            $new_imageName  = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $new_imageName);
            $input['image'] = "$new_imageName";
        } else {
            unset($input['image']);
        }

        $product->update($input);
        return redirect()->route('products.index')->with('msg', 'Product is Updated Successfully');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('msg', 'Data is Deleted');
    }
}
