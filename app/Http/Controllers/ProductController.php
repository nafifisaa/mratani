<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'features' => 'array',
            'features.*' => 'string|max:255',
            'is_featured' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $data = $request->all();

        // Handle checkbox
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Filter out empty features
        if (isset($data['features'])) {
            $data['features'] = array_filter($data['features'], function($feature) {
                return !empty(trim($feature));
            });
        }

        Product::create($data);

        return redirect()->route('dashboard.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'features' => 'array',
            'features.*' => 'string|max:255',
            'is_featured' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $data = $request->all();

        // Handle checkbox
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Filter out empty features
        if (isset($data['features'])) {
            $data['features'] = array_filter($data['features'], function($feature) {
                return !empty(trim($feature));
            });
        }

        $product->update($data);

        return redirect()->route('dashboard.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('dashboard.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
