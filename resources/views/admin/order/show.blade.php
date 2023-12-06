@extends('layouts.layout admin.index')

@section('header',' لیست سفارشات')
@section('products','active')

@section('address')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.order.index') }}">بازگشت</a>
    </li>
@endsection

@section('content')

    <div class="col-md-12 ">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header text-center" style="background-color: #343a40">
                <h3 class="card-title">نمایش سفارش {{ $order->name }}</h3>
            </div>
        <!-- /.card-header -->
            <br>

            <div class="text-center">
                <p>تصویر محصول سفارش شده</p>
                <img src="{{$order?->product?->image}}" class="rounded col-3">
            </div>

                <div class="modal-body mb-1 te">

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">شماره سفارش</label>
                            <input required value="{{$order->id}}" type="text"
                                   class="form-control" name="id" >
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">تعداد سفارش</label>
                            <input required value="{{$order->count}}" type="text"
                                   class="form-control" name="count" >
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">کاربر سفارش دهنده</label>
                            <input required value="{{$order?->user?->name}}" type="text"
                                   class="form-control" name="user" >
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">تاریخ سفارش</label>
                            <input required value="{{ Verta::instance($order->created_at)->formatDate() }}" type="text"
                                   class="form-control" name="date" >
                        </div>
                    </div>
                </div>

        </div>
        <!-- /.card -->
    </div>

@endsection
