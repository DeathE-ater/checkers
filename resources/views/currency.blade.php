@extends('layouts.app')

@section('content')
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;margin-top:43px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s3">
                <img src="{{url('/images/avatar.png')}}" class="w3-circle w3-margin-right" style="width:60px">
            </div>
            <div class="w3-col s9 w3-bar">
                <h5 style="margin-top: 20px;"><span>Welcome, <strong>{{ Auth::user()->first_name }}</strong></span></h5><br>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="{{ route('home') }}" class="w3-bar-item w3-button w3-padding" id="payments-menu" ><i class="fa fa-diamond fa-fw"></i>  Payments</a>
            <a href="{{ route('currency') }}" class="w3-bar-item w3-button w3-padding w3-blue" id="buy-currency-menu" ><i class="fa fa-bank fa-fw"></i>  Buy Currency</a>
            <a href="#" class="w3-bar-item w3-button w3-padding" id="settings-menu"><i class="fa fa-cog fa-fw"></i>  Settings</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-sign-out fa-fw"></i>  Logout</a><br><br>
        </div>
    </nav>
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->

        <div class="w3-panel buy-currency-tab">
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-card-4 w3-white buy-currency-body">
                    @if ( $result == 'success' )
                        <div class="w3-green" id="buy-currency-success">
                            <strong>Success!</strong> You have Successfully bought {{ $amount }} points.
                        </div>
                        <br/>
                    @endif

                    <h5><b>Buy Currency</b></h5><br/>
                    <form method="POST" action="{{ route('buyCurrency') }}">
                        @csrf
                        Enter Amount:<br/><br/>
                        <input type="text" name="currencyAmount" class="form-control @error('currencyAmount') is-invalid @enderror" placeholder="Amount" required/>
                        @error('currencyAmount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="submit" value="Buy">
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="w3-container w3-bottom w3-dark-grey">
            <h4></h4>
            <p>Powered by <a href="#">Softicks</a></p>
        </footer>

        <!-- End page content -->
    </div>
@endsection
