<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePage;
use App\Http\Requests\Admin\UpdatePage;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    // public function create()
    // {
    //     return view('admin.pages.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePage  $request
     * @return Response
     */
    public function store(CreatePage $request)
    {
        $data = $request->all();
        $data['image'] = Page::uploadImage($request);
        $data['video'] = Page::uploadVideo($request);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Page::create($data)) {
            return redirect()->route('page.index')->with('message', "Page created successfully");
        }

        return redirect()->route('page.index')->with('message', "Unable to create page");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.edit' , compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePage $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdatePage $request, int $id): RedirectResponse
    {
        if (!Page::find($id)) {
            return redirect()->route('page.index')->with('message', "Page not found");
        }

        $page = Page::find($id);

        $data = $request->all();

        $data['image'] = Page::updateImage($request, $page);
        $data['video'] = Page::updateVideo($request, $page);
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'uz');

        if ($page->update($data)) {
            return redirect()->route('page.index')->with('message', "page updated successfully");
        }

        return redirect()->route('page.index')->with('message', "Unable to update page");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);

        if (File::exists(public_path() . $page->image)) {
            File::delete(public_path() . $page->image);
        }

        if ($page->delete()) {
            return redirect()->route('page.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('page.index')->with('message', "failed to delete successfully!!!");
    }
}
