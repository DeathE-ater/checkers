<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->user_type == 'C') {
            $response['result'] = 'view';
            $response['tab'] = 'currency';
            return view('currency', $response);
        }
        return redirect('manageUsers');
    }

    public function buy(Request $request){
        if(Auth::user()->user_type == 'C') {
            $validatedData = $request->validate([
                'currencyAmount' => ['required', 'numeric'],
            ]);
            $amount = $validatedData['currencyAmount'];
            $id = Auth::id();
            Payment::create([
                'payment_id' => time(),
                'payment_method' => 'PayPal',
                'user_id' => $id,
                'amount' => $amount,
            ]);
            $response['result'] = 'success';
            $response['amount'] = $amount;
            $response['tab'] = 'currency';
            return view('currency', $response);
        }
        return redirect('manageUsers');
    }

}
