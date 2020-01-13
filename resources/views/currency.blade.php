@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->

        <div class="w3-panel buy-currency-tab w3-white w3-card-4" style="padding: 45px 40px; margin: 20px 15px;">
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-card-4 w3-white buy-currency-body">
                    @if ( $result == 'success' )
                        <div class="w3-green" id="buy-currency-success">
                            <strong>Success!</strong> You have Successfully bought {{ $amount }} MySenCoin.
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
         @include('footer')
        <!-- End page content -->
    </div>

@endsection
