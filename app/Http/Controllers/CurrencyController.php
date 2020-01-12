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
        $data['result'] = 'view';
        return view('currency', $data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'currencyAmount' => ['required', 'numeric'],

        ]);
    }

    public function buy(Request $request){
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
        $data['result'] = 'success';
        $data['amount'] = $amount;
        return view('currency', $data);
    }

}
