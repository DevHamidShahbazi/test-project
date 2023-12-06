@extends('layouts.layout public.index')

@section('content')

    <div class="d-flex justify-content-center align-items-center" style="background-color: #213854;height: 100vh" >
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
                <a href="{{route('public.products')}}" class="btn btn-outline-light btn-lg font-weight-bold mx-2">
                    نمایش محصولات
                </a>
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

@endsection
