<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewProfile() {
        $user = Auth::user();
        $response['user'] = $user;
        $response['tab'] = 'profile';
        return view('profile', $response);
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'firstName' => ['required', 'string', 'max:30'],
            'lastName' => ['required', 'string', 'max:30'],
            'phone_number' => ['required', 'numeric', 'unique:users'],
        ]);

        $user = Auth::user();
        $oldAvatar = $user->avatar;

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->first_name = request()->firstName;
        $user->last_name = request()->lastName;
        $user->phone_number = request()->phone_number;
        $user->save();

        if(Storage::exists('avatars/' . $oldAvatar)){
            Storage::delete('avatars/' . $oldAvatar);
        }

        return back()
            ->with('success','You Profile has been saved successfully.');
    }

}
