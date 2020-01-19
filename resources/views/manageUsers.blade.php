@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="w3-panel payments-tab w3-white w3-card-4" style="padding: 45px 40px; margin: 20px 15px;">
            <div class="w3-row-padding" style="margin:0 -16px">
                <table id="table_id" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-card-4 w3-white display nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Registration Date</th>
                        <th>Verified</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><a href="storage/app/public/avatars/{{$user->avatar}}" target="_blank"> <img src="storage/thumbnails/{{$user->avatar_thumbnail}}" width="50px"/></a></td>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ date("g:i a d-m-Y", strtotime($user->created_at)) }}</td>
                                <td>
                                    <div align="center">
                                        <label class="switch">
                                            <input type="checkbox" name="verified" id="{{$user->id}}" {{ $user->verified == 'Y'? 'checked':'' }} onchange="verifyUser({{$user->id}}, this)" />
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <!-- Footer -->
        @include('footer')
        <!-- End page content -->
    </div>
@endsection
