<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products =Product::all();
        return view('products.products', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
       $request->validate([
           'name' => 'required',
           'description' => 'required',
           'price' => 'required',

       ]);


    Product::create($request->all());

    return redirect()->route('products.index')->with('success', 'Product created successfully.');

    }


    public function show($id)
    {

    }


    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));

    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product->uptade($request->all());

        return redirect()->route('products.index')->with('success', 'Product uptade successfully.');

    }

    public function destroy(Product $product)
    {
        $prroduct->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');

    }
}
