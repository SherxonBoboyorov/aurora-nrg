<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Uslug;
use App\Models\Send;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ServicesController extends Controller
{
    public function index()
    {
        $service = Uslug::find(1);

        Meta::setTitle($service->{'meta_title_' . LaravelLocalization::getCurrentLocale()});
        Meta::setDescription($service->{'meta_description_' . LaravelLocalization::getCurrentLocale()});

        return view('front.services', [
            'uslug' => $service,
        ]);
    }

    public function saveSend(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required'
        ])->validate();

        Send::create($request->all());

        return back()->with('message', 'muvaffaqqiyali yuborildi');
    }
}
