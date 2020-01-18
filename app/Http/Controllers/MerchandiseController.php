<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class MerchandiseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAddMerchandise() {
        if(Auth::user()->user_type == 'A') {
            $response['tab'] = 'addMerchandise';
            return view('addMerchandise', $response);
        }
        return redirect('home');
    }


    public function addMerchandise(Request $request) {
        if(Auth::user()->user_type == 'A') {
            $request->validate([
                'merchandisePhoto' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024'],
                'amount' => ['required', 'numeric'],
                'file_name' => ['required', 'string', 'unique:media'],
                //'mimetypes:video/avi,video/mpeg,video/quicktime'
            ]);

            $photoName = request()->file_name . '.' . request()->merchandisePhoto->getClientOriginalExtension();
            $photoThumbnail = request()->file_name . '_thumbnail' . '.' . request()->merchandisePhoto->getClientOriginalExtension();

            request()->merchandisePhoto->storeAs('merchandise', $photoName);
            $image = request()->merchandisePhoto;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path('storage/thumbnails/' . $photoThumbnail));


            Media::create([
                'file_type' => 'M',
                'file_name' => request()->file_name,
                'file_url' => $photoName,
                'file_thumbnail' => $photoThumbnail,
                'amount' => request()->amount,
            ]);
            $response['tab'] = 'addMerchandise';
            $response['success'] = 'Your Merchandise has been saved successfully.';
            return back()
                ->with($response);
        }
        return redirect('home');
    }

    public function viewMerchandise(){
        if(Auth::user()->user_type == 'A') {
            $merchandises = Media::where('file_type', 'M')->orderBy('id')->get();
            $response['merchandises'] = $merchandises;
            $response['tab'] = 'viewMerchandise';
            return view('viewMerchandise', $response);
        }
        return redirect('home');
    }

}
