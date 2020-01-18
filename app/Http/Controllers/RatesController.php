<?php

namespace App\Http\Controllers;

use App\Rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewRates() {
        if(Auth::user()->user_type == 'A') {
            $rates = Rates::orderBy('id')->get();
            $response['rates'] = $rates;
            $response['tab'] = 'rates';
            $response['result'] = 'view';
            return view('viewRates', $response);
        }
        return redirect('home');
    }

    public function updateRates(Request $request) {
        if(Auth::user()->user_type == 'A') {
            $request->validate([
                'Beginner_rate' => ['numeric', 'required'],
                'Beginner_platForm_fee' => ['numeric', 'required'],
                'Intermediate_rate' => ['numeric', 'required'],
                'Intermediate_platForm_fee' => ['numeric', 'required'],
                'Professional_rate' => ['numeric', 'required'],
                'Professional_platForm_fee' => ['numeric', 'required'],
            ]);

            $rate = Rates::find(1);
            $rate->rate = $request->Beginner_rate;
            $rate->platform_fee = $request->Beginner_platForm_fee;
            $rate->save();

            $rate = Rates::find(2);
            $rate->rate = $request->Intermediate_rate;
            $rate->platform_fee = $request->Intermediate_platForm_fee;
            $rate->save();

            $rate = Rates::find(3);
            $rate->rate = $request->Professional_rate;
            $rate->platform_fee = $request->Professional_platForm_fee;
            $rate->save();

            $rates = Rates::orderBy('id')->get();
            $response['rates'] = $rates;
            $response['result'] = 'success';
            $response['tab'] = 'rates';
            return view('viewRates', $response);
        }
        return redirect('home');
    }
}
