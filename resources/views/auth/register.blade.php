@extends('layouts.app')

@section('content')
    @include('auth.userAgreement')
    <div id="signup-box">
        <div class="left signup-left">
            <h1 class="signup-heading">Sign up</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" id="firstName" class="form-control @error('firstName') is-invalid @enderror" name="firstName" placeholder="First Name" value="{{ old('firstName') }}" maxlength="30" required autocomplete="given-name" autofocus>
                @error('firstName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="text" id="lastName" class="form-control @error('lastName') is-invalid @enderror" name="lastName" placeholder="Last Name" value="{{ old('lastName') }}" maxlength="30" required autocomplete="family-name">
                @error('lastName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="tel" id="phoneNumber" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" required autocomplete="tel" />
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" minlength="8" placeholder="Password" required autocomplete="new-password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Retype password" minlength="8" required autocomplete="new-password" />

                <input type="checkbox" id="userAgreement" name="userAgreement" required /> I Agree to <a href="javascript:void(0)" onclick="openNav()">User Agreement </a>
                <br/>

                <input type="submit" name="signupSubmit" value="Sign me up" />
            </form>
        </div>

        <div class="right signup-right">
            <span class="loginwith">Sign in with<br />social network</span>

            <button class="social-signin facebook">Log in with facebook</button>
            <button class="social-signin google">Log in with Google+</button>
        </div>
        <div class="or">OR</div>
    </div>

@endsection
