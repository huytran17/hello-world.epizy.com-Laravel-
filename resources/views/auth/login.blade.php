@extends('layouts.client')
@section('title')
    Đăng nhập
@endsection
@section('content')
<section id="SignIn">
    <div class="container">
        <div class="signin-content row">
            <div class="signin-image col-12 col-md-6" style="background-image: url({{ asset('img/in.jpg') }})">
            </div>
            <div class="signin-form col-12 col-md-6">
                <h2 class="form-title">Đăng nhập</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Tên đăng nhập">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="form-group form-checkbox">
                        <input type="checkbox" name="remember_me" id="remember_me" class="agree-term" {{ old('remember_me') ? 'checked' : '' }}>
                        <label for="remember_me" class="label-agree-term"><span><span></span></span>{{ __('Ghi nhớ') }}</label>
                    </div>
                    <div class="form-group row mb-0">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Đăng nhập') }}
                        </button>
                    </div>
                    <div class="form-group mb-0">
                        <a href="{{ route('pwd.forgot') }}" class="forgot-pwd-link">{{ __('Quên mật khẩu?') }}</a>
                        <br>
                        <a href="{{ route('register') }}" class="signup-link">Đăng ký</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
