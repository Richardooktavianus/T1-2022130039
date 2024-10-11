<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produk::paginate(10);

        return view('produks.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:produks|max:12',
            'product_name' => 'required|unique:produks|max:255',
            'description' => 'nullable',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|max:2',
            'quantity' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePatch = $file->storeAs('public', $fileName);
            $validatedData['photo'] = $filePatch;
        }

        Produk::create($validatedData);

        return redirect()->route('produks.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Produk::findOrFail($id);

        return view('produks.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Produk::findOrFail($id);

        return view('produks.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'description' => 'nullable',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|max:2',
            'quantity' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePatch = $file->storeAs('public', $fileName);
            $validatedData['photo'] = $filePatch;
        }

        $product = Produk::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('produks.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Produk::findOrFail($id);
        if ($product->photo) {
            Storage::delete($product->photo);
        }
        $product->delete();

        return redirect()->route('produks.index')->with('success', 'Product deleted successfully!');
    }
}

