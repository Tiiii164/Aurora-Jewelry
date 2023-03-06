<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cate = Categories::all();
        return view('category.cateShow')->with($cate);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate = Categories::all();
        return view('category.cateCreate')->with($cate);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cate = new Categories();
        $cate->name = $request->input('name');
        $cate->description = $request->input('description');
        $cate->quantity = $request->input('quantity');
        $cate->save();
        return redirect('/category/cateShow');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cate = Categories::find($id);
        return view('category.cateUpdate')->with($cate);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cate = Categories::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'quantity' => $request->input('quantity')
            ]);
        return redirect('/category/cateUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cate = Categories::find($id);
        $cate->delete();
        return redirect('/category/cateShow');
    }
}
