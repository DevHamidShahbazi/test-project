@extends('layouts.layout auth.index')


@section('content')
    <div class="register-box">

        <div class="register-logo">
            <b class="font-weight-bold text-white">ثبت نام</b>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                @include('components.errors.index')
                <p class="login-box-msg">فرم زیر را تکمیل کنید و دکمه ثبت نام را بزنید</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            type="text" class="form-control" placeholder="نام و نام خانوادگی">

                    </div>
                    <div class="input-group mb-3">
                        <input name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                               type="number" class="form-control" placeholder="شماره موبایل">

                    </div>

                    <div class="input-group mb-3" id="show_hide_password" >
                        <input name="password" value="{{ old('password') }}" required autocomplete="new-password"
                               type="password" class="form-control" placeholder="رمز عبور">
                    </div>

                    <div class="input-group mb-3">

                        <input name="password_confirmation" required autocomplete="password_confirmation"
                               type="password" class="form-control" placeholder="تکرار رمز عبور">

                    </div>

                    <button  type="submit" class="col-12 btn btn-primary font-weight-bold">
                        <i class="fas fa-sign-in-alt"></i>
                        ثبت نام
                    </button>
                </form>
                <br>
                <a href="{{ route('login') }}" class="text-center text-primary">من قبلا ثبت نام کرده ام!!</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection

