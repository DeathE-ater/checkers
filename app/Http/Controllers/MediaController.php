<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAddPhoto() {
        if(Auth::user()->user_type == 'A') {
            $response['tab'] = 'addPhoto';
            return view('addPhoto', $response);
        }
        return redirect('home');
    }


    public function addPhoto(Request $request) {
        if(Auth::user()->user_type == 'A') {
            $request->validate([
                'mediaPhoto' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024'],
                'file_name' => ['required', 'string', 'unique:media'],
                //'mimetypes:video/avi,video/mpeg,video/quicktime'
            ]);

            $photoName = request()->file_name . '.' . request()->mediaPhoto->getClientOriginalExtension();
            $photoThumbnail = request()->file_name . '_thumbnail' . '.' . request()->mediaPhoto->getClientOriginalExtension();

            request()->mediaPhoto->storeAs('photos', $photoName);
            $image = request()->mediaPhoto;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path('storage/thumbnails/' . $photoThumbnail));


            Media::create([
                'file_type' => 'P',
                'file_name' => request()->file_name,
                'file_url' => $photoName,
                'file_thumbnail' => $photoThumbnail,
            ]);
            $response['tab'] = 'addPhoto';
            $response['success'] = 'Your Photo has been saved successfully.';
            return back()
                ->with($response);
        }
        return redirect('home');
    }

    public function viewAddVideo() {
        if(Auth::user()->user_type == 'A') {
            $response['tab'] = 'addVideo';
            return view('addVideo', $response);
        }
        return redirect('home');
    }


    public function addVideo(Request $request) {
        $request->validate([
            'mediaVideo' => ['mimetypes:video/mp4', 'max:30720'],
            'file_name' => ['required', 'string', 'unique:media'],
            //'mimetypes:video/avi,video/mpeg,video/quicktime'
        ]);

        $videoName = request()->file_name . '.' . request()->mediaVideo->getClientOriginalExtension();

        request()->mediaVideo->storeAs('videos',$videoName);

        Media::create([
            'file_type' => 'V',
            'file_name' => request()->file_name,
            'file_url' => $videoName,
            'file_thumbnail' => '',
        ]);
        $response['tab'] = 'addVideo';
        $response['success'] = 'Your Video has been saved successfully.';
        return back()
            ->with($response);
    }

    public function viewPhotos(){

        $photos = Media::where('file_type', 'P')->orderBy('id')->get();
        $response['photos'] = $photos;
        $response['tab'] = 'viewPhotos';
        return view('viewPhotos', $response);
    }

    public function viewVideos(){

        $videos = Media::where('file_type', 'V')->orderBy('id')->get();
        $response['videos'] = $videos;
        $response['tab'] = 'viewVideos';
        return view('viewVideos', $response);
    }

}
