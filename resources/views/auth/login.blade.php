@extends('layouts.app')

@section('content')
    <div id="container">
        <div class="row" >
            <div class="col-md-3"></div>
            <div class="left col-md-3" style="background: white; margin-top: 70px;">
                <h1 class="login-heading">{{ __('Login') }}</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Email" value="{{ old('email') }}" required autofocus />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" />
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
    {{--            @if (Route::has('password.request'))--}}
    {{--                <a class="" href="{{ route('password.request') }}">--}}
    {{--                    {{ __('Forgot Your Password?') }}--}}
    {{--                </a>--}}
    {{--            @endif--}}
            </div>

            <div class="right col-md-3" style="background: url('images/signup-background.jpeg'); background-size: cover; background-position: center; margin-top: 70px;">
                <span class="loginwith">Login with<br />social network</span>

                <button class="social-signin facebook">Log in with facebook</button>
                <a href="{{ route('redirect') }}"><button class="social-signin google">Log in with Google+</button></a>
            </div>

        </div>
    </div>

@endsection
