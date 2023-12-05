@extends('layouts.layout admin.index')
@section('dashboard','active')
@section('content')
    <h1 class="text-center p-5 font-weight-bold">پنل مدیریت</h1>
    <div class="col-12">

        <div class="card">
            <p class="text-center">لیست محصولات</p>
            <b class="text-center">method:GET   /products</b>
        </div>

        <div class="card">
            <p class="text-center">ثبت سفارش (برای دسترسی باید ثبت نام کنید)</p>
            <b class="text-center">method:POST   /store-order</b>
        </div>

    </div>
@endsection
