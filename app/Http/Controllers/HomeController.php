<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            return view('home');

    }
    public function userHome()
    {
        if(Auth::user()->user_type == 'C') {
            $payments = Payment::where('user_id', Auth::id())->get();
            $response['payments'] = $payments;
            $response['tab'] = 'home';
            return view('home', $response);
        }
        return redirect('manageUsers');
    }
}
