@extends('layouts.app')

@section('content')
<body class="login-body">
<div class="login-box">
    <h2 class="login-title">Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="user-box">
                <label for="email" >{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>

        <div class="user-box">
                <label for="password" >{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

       <div class="login-buttons">
            <div class="button-link">
                <button class="login-btn">
                    {{ 'Login' }}
                </button>
            </div>
            <div>
                @if (Route::has('password.request'))
                    <a class="form-check-label forgot-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    

        

    </form>
</div>
</body>
@endsection
