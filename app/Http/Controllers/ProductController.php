<?php

namespace App\Http\Controllers;
use App\Models\Product; 

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product')); // Pass product to the view
    }

    // public function update(Request $request, Product $product)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'amount' => 'required|numeric',
    //         'description' => 'nullable|string',
    //         'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('products', 'public');
    //         $validatedData['image'] = $imagePath;
    //     }

    //     $product->update($validatedData);

    //     return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    // }
    public function update(Request $request, Product $product)
    {
        // Debugging: Check the data being submitted
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        // dd($validatedData); // This will stop execution and display form data
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
            // dd($imagePath); 
        }
    
        // Update the product with the validated data
        $product->update($validatedData);
    
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
    
   
    public function show($id)
    {
        $product = Product::findOrFail($id); // Fetch the product using the ID
        return view('products.show', compact('product')); // Return the 'products.show' view with the product data
    }


}
