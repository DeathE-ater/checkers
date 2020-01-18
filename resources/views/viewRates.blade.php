@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="w3-panel buy-currency-tab w3-white w3-card-4" style="padding: 45px 40px; margin: 20px 15px;">
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-card-4 w3-white buy-currency-body">
                    @if ( $result == 'success' )
                        <div class="w3-green" id="buy-currency-success">
                            <strong>Success!</strong> Your settings have been saved Successfully.
                        </div>
                        <br/>
                    @endif
                    <h5><b>Game Rates</b></h5><br/>
                    <form method="POST" action="{{ route('updateRates') }}">
                        @csrf
                        <div class="row">
                            @foreach ($rates as $rate)
                                <div class="col-md-4">
                                    <strong>{{$rate->game_level}}</strong><br/><br/><br/>
                                    <label for="{{$rate->game_level}}_rate">Rate</label>
                                    <input type="text" id="{{$rate->game_level}}_rate" name="{{$rate->game_level}}_rate" class="form-control @error( $rate->game_level.'_rate') is-invalid @enderror" value="{{ $rate->rate }}" placeholder="Rate" required/>
                                    @error($rate->game_level.'_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="{{$rate->game_level}}_platForm_fee">Platform Fee</label>
                                    <input type="text" id="{{$rate->game_level}}_platForm_fee" name="{{$rate->game_level}}_platForm_fee" class="form-control @error( $rate->game_level.'_platForm_fee') is-invalid @enderror" value="{{ $rate->platform_fee }}" placeholder="Platform Fee" required/>
                                    @error($rate->game_level.'_platForm_fee')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        <input type="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
         @include('footer')
        <!-- End page content -->
    </div>

@endsection
