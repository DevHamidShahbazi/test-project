<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderRepository $orderRepository)
    {}

    public function storeOrder(OrderRequest $orderRequest)
    {
        $this->orderRepository->store($orderRequest->toDTO());
        return redirect(route('public.home'))->with('success', 'اضافه شد');
    }
}
