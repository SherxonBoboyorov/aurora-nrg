<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Butschster\Head\Facades\Meta;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AboutController extends Controller
{
    public function about()
    {
        $pages = Page::orderBy('created_at')->paginate(1);

        $page = $pages->first();

        Meta::setTitle($page->{'meta_title_' . LaravelLocalization::getCurrentLocale()});
        Meta::setDescription($page->{'meta_description_' . LaravelLocalization::getCurrentLocale()});

        return view('front.about', [
            'pages' => $pages
        ]);
    }
}
