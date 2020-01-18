@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="w3-panel payments-tab w3-white w3-card-4" style="padding: 45px 40px; margin: 20px 15px;">
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="container">
                    <div class="row  ">
                        <div class="col-md-4">
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
                        <div class="profile-header-container col-md-4">
                            <div class="profile-header-img">
                                <img class="rounded-circle" src="storage/avatars/{{ $user->avatar }}"  style="width:150px;"/>
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 1MB.</small>
                            </div>

                            <input type="text" id="firstName" class="form-control @error('firstName') is-invalid @enderror" name="firstName" placeholder="First Name" value="{{ $user->first_name }}" maxlength="30" required autocomplete="given-name" autofocus>
                            @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" id="lastName" class="form-control @error('lastName') is-invalid @enderror" name="lastName" placeholder="Last Name" value="{{ $user->last_name }}" maxlength="30" required autocomplete="family-name">
                            @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}" readonly />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="tel" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number" value="{{ $user->phone_number }}" required autocomplete="tel" />
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br/>
                            <input type="submit" name="signup_submit" value="Update" />
                            <br/>
                            <br/>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
