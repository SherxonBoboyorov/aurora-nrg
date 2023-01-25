<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Number;
use App\Models\UsefulResource;
use App\Models\Page;
use App\Models\Uslug;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Options;
use App\Models\Categoriy;
use App\Models\Dizel;
use Butschster\Head\Facades\Meta;

class IndexController extends Controller
{
    public function homepage()
    {
        Meta::setTitle(Options::where('key', 'meta_title_' . LaravelLocalization::getCurrentLocale())->first()->value);
        Meta::setDescription(Options::where('key', 'meta_description_' . LaravelLocalization::getCurrentLocale())->first()->value);

        return view('front.index', [
            'sliders' =>  Slider::orderBy('created_at', 'DESC')->get(),
            'articles' => Article::orderBy('created_at', 'DESC')->take(3)->get(),
            'numbers' => Number::orderBy('created_at', 'DESC')->get(),
            'usefulResources' => UsefulResource::orderBy('created_at', 'DESC')->get(),
            'pages' => Page::orderBy('created_at', 'DESC')->paginate(1),
            'uslugs' => Uslug::orderBy('created_at', 'DESC')->paginate(1),
            'categoriys' => Categoriy::orderBy('created_at', 'DESC')->get()
        ]);
    }
}
