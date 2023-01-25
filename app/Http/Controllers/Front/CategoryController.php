<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Categoriy;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriys = Categoriy::orderBy('created_at')->get();

        $page = $categoriys->first();

        Meta::setTitle($page->{'meta_title_' . LaravelLocalization::getCurrentLocale()});
        Meta::setDescription($page->{'meta_description_' . LaravelLocalization::getCurrentLocale()});

        return view('front.index_in', [
            'categoriys' => $categoriys
        ]);
    }

    public function categoriy($id)
    {
        $categoriy = Categoriy::findOrFail($id);

        Meta::setTitle($categoriy->{'meta_title_' . LaravelLocalization::getCurrentLocale()});
        Meta::setDescription($categoriy->{'meta_description_' . LaravelLocalization::getCurrentLocale()});

        return view('front.categoriy_in');
    }
}
