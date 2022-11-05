<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\ResponseFactory;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|ResponseFactory
     */
    public function index()
    {
        $products = ProductResource::collection(Product::all());

        return inertia('Admin/Product/Index', compact( 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response|ResponseFactory
     */
    public function create()
    {
        $categories = Category::with('subcategories')->get();
        $subcategories = Subcategory::all();
        $brands = Brand::all();

        return inertia('Admin/Product/Create', compact('brands', 'categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProductStoreRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Inertia\Response|ResponseFactory
     */
    public function edit(Product $product)
    {
        $categories = Category::with('subcategories')->get();
        $subcategories = Subcategory::all();
        $brands = Brand::all();

        return inertia('Admin/Product/Edit', compact('product', 'categories', 'subcategories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     */
    public function update(Product $product, ProductStoreRequest $request)
    {
        $product->update($request->validated());

        return redirect()->route('product.index')->with('message', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
