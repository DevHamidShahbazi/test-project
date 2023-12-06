<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(private ProductRepository $productRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //The list of all products with paginate
        $products = $this->productRepository->getPaginated();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $this->productRepository->store($request->toDTO());
        return redirect(route('admin.product.index'))->with('success', 'اضافه شد');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->productRepository->update($product,$request->toDTO());
        return redirect(route('admin.product.index'))->with('success', 'ویرایش شد');
    }

}
