<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
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
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024'],
            'firstName' => ['required', 'string', 'max:30'],
            'lastName' => ['required', 'string', 'max:30'],
            'phone_number' => ['required', 'numeric'],
        ]);

        $user = Auth::user();
        $oldAvatar = $user->avatar;
        $oldAvatarThumbnail = $user->avatar_thumbnail;

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $photoThumbnail = $user->id.'_avatar'.time() .'_thumbnail' . '.' .request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatars',$avatarName);

        $image       = request()->avatar;
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image_resize->save(public_path('storage/thumbnails/' .$photoThumbnail));

        $user->avatar = $avatarName;
        $user->avatar_thumbnail = $photoThumbnail;
        $user->first_name = request()->firstName;
        $user->last_name = request()->lastName;
        $user->phone_number = request()->phone_number;
        $user->save();

        if($oldAvatar != 'avatar.png' && Storage::exists('avatars/' . $oldAvatar) ){
            Storage::delete('avatars/' . $oldAvatar);
        }
        if($oldAvatarThumbnail != 'avatar_thumbnail.png' && Storage::exists('thumbnails/' . $oldAvatarThumbnail) ){
            Storage::delete('thumbnails/' . $photoThumbnail);
        }

        return back()
            ->with('success','Your Profile has been saved successfully.');
    }

    public function viewUsers(){
        if(Auth::user()->user_type == 'A') {
            $users = User::where('user_type', 'C')->orderBy('id')->get();
            $response['tab'] = 'manageUsers';
            $response['users'] = $users;
            return view('manageUsers', $response);
        }
        return redirect('home');
    }

    public function verifyUser(Request $request){
        if(Auth::user()->user_type == 'A') {
            $request->validate([
                'id' => ['required', 'numeric'],
                'verified' => ['required', Rule::in(['Y', 'N'])],
            ]);
            if (request()->verified == 'N' || request()->verified == 'Y') {
                $user = User::find(request()->id);
                $user->verified = request()->verified;
                $user->save();
                $response['response'] = 'success';
                return response()->json($response);
            }
            $response['response'] = 'failure';
            return response()->json($response);
        }
        return redirect('home');
    }
}
