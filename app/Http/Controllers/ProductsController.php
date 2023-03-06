<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('product.productShow')->with($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Products::all();
        return view('product.productCreate')->with($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Products();
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->price = $request->input('price');
        $products->thumbnail = $request->input('thumbnail');
        $products->categories_id = $request->input('categories_id');
        $products->save();
        return redirect('/product/productShow');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Products::find($id);
        return view('product.productUpdate')->with($products);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $products = Products::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'price' => $request->input('price'),
                'thumbnail' => $request->input('thumbnail')
            ]);
        return redirect('/products/productsUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        return redirect('/product/productShow');
    }
}
