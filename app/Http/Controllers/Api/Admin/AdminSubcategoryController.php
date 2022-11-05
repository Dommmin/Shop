<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryStoreRequest;
use App\Http\Resources\SubcategoryResource;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        $subcategories = SubcategoryResource::collection(Subcategory::all());

        return inertia('Admin/Subcategory/Index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function create()
    {
        $categories = Category::all();

        return inertia('Admin/Subcategory/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubcategoryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(SubcategoryStoreRequest $request)
    {
        Subcategory::create($request->validated());

        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subcategory $subcategory
     * @return RedirectResponse
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->products()->delete();
        $subcategory->delete();

        return redirect()->route('subcategory.index');
    }
}
