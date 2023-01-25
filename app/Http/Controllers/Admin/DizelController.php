<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDizel;
use App\Http\Requests\Admin\UpdateDizel;
use App\Models\Dizel;
use App\Models\Categoriy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DizelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dizels = Dizel::orderBy('created_at', 'DESC')->get();

        return view('admin.dizel.index', [
            'dizels' => $dizels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriys = Categoriy::orderBy('created_at', 'DESC')->get();

        return view('admin.dizel.create', [
            'categoriys' => $categoriys
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateDizel  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDizel $request)
    {
        $data = $request->all();

        if (Dizel::create($data)) {
            return redirect()->route('dizel.index')->with('message', "Product created successfully");
        }
        return redirect()->route('dizel.index')->with('message', "Unable to create product");
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
    public function edit(Dizel $dizel)
    {
         $categoriys = Categoriy::orderBy('created_at', 'DESC')->get();
         
         return view('admin.dizel.edit', [
            'categoriys' => $categoriys,
            'dizel' => $dizel
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateDizel  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDizel $request, $id)
    {
        $dizel = Dizel::find($id);
        $data = $request->all();

        if ($dizel->update($data)) {
            return redirect()->route('dizel.index')->with('message', "Product updated successfully");
        }

        return redirect()->route('dizel.index')->with('message', "Unable to update product");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dizel = Dizel::find($id);

        if ($dizel->delete()) {
            return redirect()->route('dizel.index')->with('message', "Product deleted successfully");
        }
        return redirect()->route('dizel.index')->with('message', "Unable to delete product");
    }
}
