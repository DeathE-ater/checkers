@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="w3-panel buy-currency-tab w3-white w3-card-4" style="padding: 45px 40px; margin: 20px 15px;">
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-card-4 w3-white buy-currency-body">
                    <div class="row">
                        @foreach($videos as $video)
                            <div class="col-md-4" style="margin-bottom: 30px;">
                                <p style="font-size: 16px; padding-top: 20px;"><strong>{{ $video->file_name }}</strong></p>
                                <video width="220" controls id="addVideo">
                                    <source src="/storage/videos/{{ $video->file_url }}" type="video/mp4">
                                </video>
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
