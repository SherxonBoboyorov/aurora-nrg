<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUslug;
use App\Http\Requests\Admin\UpdateUslug;
use App\Models\Uslug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class UslugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uslugs = Uslug::orderBy('created_at', 'DESC')->get();
        return view('admin.uslugs.index', compact('uslugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.uslugs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateUslug  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUslug $request)
    {
        $data = $request->all();
        $data['image'] = Uslug::uploadImage($request);
        $data['video'] = Uslug::uploadVideo($request);
       
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Uslug::create($data)) {
            return redirect()->route('uslug.index')->with('message', "Service created successfully");
        }

        return redirect()->route('uslug.index')->with('message', "Unable to create service");
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
        $uslug = Uslug::find($id);
        return view('admin.uslugs.edit' , compact('uslug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateUslug  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUslug $request, $id)
    {
        if (!Uslug::find($id)) {
            return redirect()->route('uslug.index')->with('message', "Service not found");
        }

        $uslug = Uslug::find($id);

        $data = $request->all();

        $data['image'] = Uslug::updateImage($request, $uslug);
        $data['video'] = Uslug::updateVideo($request, $uslug);
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'uz');

        if ($uslug->update($data)) {
            return redirect()->route('uslug.index')->with('message', "Service updated successfully");
        }

        return redirect()->route('uslug.index')->with('message', "Unable to update Service");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $uslug = Uslug::find($id);

        if (File::exists(public_path() . $uslug->image)) {
            File::delete(public_path() . $uslug->image);
        }

        if ($uslug->delete()) {
            return redirect()->route('uslug.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('uslug.index')->with('message', "failed to delete successfully!!!");
    }
}
