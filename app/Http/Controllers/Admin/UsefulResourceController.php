<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUsefulResource;
use App\Http\Requests\Admin\UpdateUsefulResource;
use App\Models\UsefulResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UsefulResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usefulResources = UsefulResource::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.useful_resource.index', compact('usefulResources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.useful_resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateUsefulResource  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsefulResource $request)
    {
        $data = $request->all();
        $data['image'] = UsefulResource::uploadImage($request);

        if (UsefulResource::create($data)) {
            return redirect()->route('useful_resource.index')->with('message', 'Useful resource successfully created');
        }

        return redirect()->route('useful_resource.index')->with('message', 'Failed to create useful resource');
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
        $usefulResource = UsefulResource::find($id);
        return view('admin.useful_resource.edit', compact('usefulResource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateUsefulResource  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsefulResource $request, $id)
    {
        $usefulResource = UsefulResource::find($id);

        $data = $request->all();
        $data['image'] = UsefulResource::updateImage($request, $usefulResource);

        if ($usefulResource->update($data)) {
            return redirect()->route('useful_resource.index')->with('message', 'Полезный ресурс успешно обновлен');
        }

        return redirect()->route('useful_resource.index')->with('message', 'Не удалось обновить полезный ресурс');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usefulResource = UsefulResource::find($id);


        if (File::exists(public_path() . $usefulResource->image)) {
            File::delete(public_path() . $usefulResource->image);
        }

        if ($usefulResource->delete()) {
            return redirect()->route('useful_resource.index')->with('message', 'Useful resource removed');
        }

        return redirect()->route('useful_resource.index')->with('message', 'Failed to delete useful resource');
    }
}
