@extends('layouts.app')

@section('content')
    <div id="login-box">
        <div class="left">
            <h1 class="login-heading">{{ __('Login') }}</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email"  placeholder="Email" value="{{ old('email') }}" required autofocus />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="submit" name="loginSubmit" value="{{ __('Login') }}"/><br/><br/>
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </form>
            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>

        <div class="right">
            <span class="loginwith">Login with<br />social network</span>

            <button class="social-signin facebook">Log in with facebook</button>
            <a href="/redirect"><button class="social-signin google">Log in with Google+</button></a>
        </div>
        <div class="or">OR</div>
    </div>

@endsection
