@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="w3-panel buy-currency-tab w3-white w3-card-4" style="padding: 45px 40px; margin: 20px 15px;">
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-card-4 w3-white buy-currency-body">
                    <div class="row">
                        @foreach($merchandises as $merchandise)
                            <div class="col-md-2" style="margin-bottom: 30px;">
                                <p style="font-size: 16px; padding-top: 20px; margin-bottom: 0px;"><strong>{{ $merchandise->file_name }}</strong></p>
                                <p style="font-size: 13px;"><strong>{{ $merchandise->amount }} RM</strong></p>
                                <a href="storage/merchandise/{{ $merchandise->file_url }}" target="_blank"> <img src="storage/thumbnails/{{ $merchandise->file_thumbnail }}"  /></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
    @include('footer')
    <!-- End page content -->
    </div>

@endsection
