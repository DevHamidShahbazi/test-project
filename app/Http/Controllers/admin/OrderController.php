<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderRepository $orderRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->orderRepository->getPaginated();
        return view('admin.order.index',compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = $this->orderRepository->show($order);
        return view('admin.order.show',compact('order'));
    }
}
