<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Callback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class ContactController extends Controller
{
    public function index()
    {
        return view('front.contacts');
    }

    /**
     * @throws ValidationException
     */
    public function saveCallback(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'required'
        ])->validate();

        Callback::create($request->all());

        return back()->with('message', 'success');
    }
}
