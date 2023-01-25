<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Dizel;
use App\Models\Send;
use App\Models\Categoriy;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    public string $currentLocale;

    public function __construct()
    {
        $this->currentLocale = LaravelLocalization::getCurrentLocale();
    }

    public function index($id)
    {
        $categoriys = Categoriy::where('id', $id)->get();

        $categoriy = $categoriys->first();

        $dizels = Dizel::where('categoriy_id', $id)->get();

        Meta::setTitle($categoriy->{'meta_title_' . LaravelLocalization::getCurrentLocale()});
        Meta::setDescription($categoriy->{'meta_description_' . LaravelLocalization::getCurrentLocale()});

        return view('front.product', [
            'dizels' => $dizels,
            'category_id' => $id,
            'categoriys' => $categoriys
        ]);
    }

    public function show(Dizel $dizel, $category_id)
    {
        $metaTitle = $dizel->{'meta_title_' . $this->currentLocale} ?? $dizel->{'title_' . $this->currentLocale};
        $metaDescription = $dizel->{'meta_description_' . $this->currentLocale} ?? $dizel->{'content_' . $this->currentLocale};

        Meta::setTitle($metaTitle);
        Meta::setDescription($metaDescription);

        return view('front.product_in', [
            'dizel' => $dizel,
            'list' => Dizel::where('categoriy_id', $category_id)->orderBy('created_at', 'DESC')->get()
        ]);
    }

           /**
     * @throws ValidationException
     */
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
