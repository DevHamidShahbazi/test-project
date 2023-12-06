@extends('layouts.layout auth.index')

@section('content')
    <div class=" login-box" >

        <div class="login-logo">
            <b class="font-weight-bold text-white">ورود</b>
        </div>

        <div class="card">
            <div class="card-body login-card-body">

                @include('components.errors.index')

                <p class="login-box-msg">فرم زیر را تکمیل کنید و دکمه ورود را بزنید</p>

                <form method="POST" action="{{ route('login') }}">

                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                    <div class="input-group mb-3">
                        <input
                            name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus
                            type="number" class="form-control" placeholder="نام کاربری را وارد کنید">
                    </div>
                    <div class="input-group mb-3" id="show_hide_password" >


                        <input name="password" value="{{ old('password') }}" required autocomplete="new-password"
                               type="password" class="form-control" placeholder="رمز عبور را وارد کنید">
                    </div>

                    <div class="row">
                        <div class="col-8 mt-4">
                            <div class="checkbox ">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    من را به یاد داشته باش
                                </label>
                            </div>

                        </div>
                    </div>
                    <br>
                    <button  type="submit" class="col-12 btn btn-primary font-weight-bold">
                        <i class="fas fa-sign-in-alt"></i>
                        ورود
                    </button>

                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection


