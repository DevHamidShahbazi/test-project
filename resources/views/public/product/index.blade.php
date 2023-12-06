@extends('layouts.layout public.index')

@section('content')

    <div class="d-flex justify-content-center align-items-center p-5" style="background-color: #213854;" >
        @if(!auth()->check())
            <a href="{{route('login')}}" class="btn btn-outline-light btn-lg font-weight-bold mx-2">
                ورود
            </a>
            <a href="{{route('register')}}" class="btn btn-outline-light btn-lg font-weight-bold mx-2">
                ثبت نام
            </a>
        @endif

        @can('admin')
            <a href="{{route('admin.dashboard')}}" class="btn btn-outline-light btn-lg font-weight-bold mx-2">
                پنل مدیریت
            </a>
        @endcan

        @auth()
            <a style="text-align: right;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               href="{{ route('logout') }}" class="btn btn-outline-light btn-lg font-weight-bold mx-2">
                <i class="fa fa-power-off ml-2"></i>
                خروج
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth
    </div>


    @if(!auth()->check())
        <div class="d-flex justify-content-center align-items-center p-5" style="background-color: #213854;" >
            برای نمایش محصولات ابتدا ثبت نام کنید
        </div>
    @endif

    @if(auth()->check())
        <div class="col-12">
            <div class="row">
                @if(!empty($products))
                    @foreach($products as $key=> $product)
                        <form style="box-sizing: inherit;display: contents" method="POST" action="{{route('public.store.order')}}">
                            @csrf
                            <input name="product_id" type="text" hidden value="{{$product->id}}">
                            <div class="col-lg-3 col-md-4 col-sm-6 p-3">
                                <div class="card shadow-lg">
                                    <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->name}}</h5>
                                        <p class="card-text">{{$product->description}}</p>
                                        <label>تعداد محصول</label>
                                        <input class="text-center" type="number" name="count" value="1" >
                                        <div class="text-center my-2">
                                            <button type="submit" class="btn btn-primary">ثبت سفارش</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                @endif
            </div>
        </div>
    @endif


@endsection
