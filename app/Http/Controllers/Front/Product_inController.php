<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Dizel;
use App\Models\Send;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Product_inController extends Controller
{
    public function index($id)
    {
        return view('front.product_in', [
            'petrol' => Dizel::find($id),
            'petrols' => Dizel::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function saveSend(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required'
        ])->validate();

        Send::create($request->all());

        return back()->with('message', 'success');
    }
}
