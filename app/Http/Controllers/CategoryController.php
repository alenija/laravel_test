<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('posts')->get();;
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categoies
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categoies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categoies
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categoies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoies  $categoies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoies $categoies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoies  $categoies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoies $categoies)
    {
        //
    }
}
