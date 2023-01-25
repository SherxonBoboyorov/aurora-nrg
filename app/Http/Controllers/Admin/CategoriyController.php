<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoriy;
use App\Http\Requests\Admin\UpdateCategoriy;
use App\Models\Categoriy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoriyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriys = Categoriy::orderBy('created_at', 'DESC')->get();
        return view('admin.categoriy.index', [
            'categoriys' => $categoriys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.categoriy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   App\Http\Requests\Admin\CreateCategoriy $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoriy $request)
    {
        $data = $request->all();

        $data['image'] = Categoriy::uploadImage($request);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Categoriy::create($data)) {
            return redirect()->route('categoriy.index')->with('message', 'Category created successfully');
        }

        return redirect()->route('categoriy.index')->with('message', 'Unable to create category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $categoriy = Categoriy::find($id);
          
       return view('admin.categoriy.edit', [
        'categoriy' => $categoriy
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateCategoriy  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriy $request, $id)
    {
        if (!Categoriy::find($id)) {
            return redirect()->route('categoriy.index')->with('message', "Category not found");
        }

        $categoriy = Categoriy::find($id);

        $data = $request->all();

        $data['image'] = Categoriy::updateImage($request, $categoriy);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($categoriy->update($data)) {
            return redirect()->route('categoriy.index')->with('message', "Category updated successfully");
        }

        return redirect()->route('categoriy.index')->with('message', "Unable to update category");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Categoriy::find($id)) {
            return redirect()->route('categoriy.index')->with('message', "Category not found");
        }

        $categoriy = Categoriy::find($id);

        if (File::exists(public_path() . $categoriy->image)) {
            File::delete(public_path() . $categoriy->image);
        }

        if ($categoriy->delete()) {
            return redirect()->route('categoriy.index')->with('message', "Category deleted successfully");
        }

        return redirect()->route('categoriy.index')->with('message', "Unable to delete category");
    }
}
