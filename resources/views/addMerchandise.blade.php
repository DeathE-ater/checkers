@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="w3-panel payments-tab w3-white w3-card-4" style="padding: 45px 40px; margin: 20px 15px;">
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="container">
                            @if ($message = Session::get('success'))

                                <div class="alert alert-success alert-block profile-alert-container">

                                    <button type="button" class="close" data-dismiss="alert">×</button>

                                    <strong>{{ $message }}</strong>

                                </div>

                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger profile-alert-container">
                                    <strong>Whoops!</strong> There were some problems with your input.<br>
                                    <ul class="proflie-error-list">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                        <div class="">
                            <div class="profile-header-img">
                                <img id="addPhoto"  style="width:150px;"/>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <form action="{{ route('addMerchandise') }}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="merchandisePhoto" id="merchandisePhoto" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 1MB.</small>
                            </div>
                            <input type="text" id="fileName" class="form-control @error('file_name') is-invalid @enderror" name="file_name" placeholder="File Name" value="" maxlength="50" required autofocus>
                            @error('file_name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" id="anount" class="form-control @error('amount') is-invalid @enderror" name="amount" placeholder="Amount" value="" maxlength="50" required>
                            @error('file_name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <br/>
                            <input type="submit" name="merchandise_submit" value="ADD" />
                            <br/>
                            <br/>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
