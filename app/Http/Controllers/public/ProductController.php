<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductRepository $productRepository)
    {}

    public function index()
    {
        $products = $this->productRepository->getPaginated();
        return view('public.product.index',compact('products'));
    }
}
