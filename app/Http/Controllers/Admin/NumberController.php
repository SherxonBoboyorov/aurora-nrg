<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateNumber;
use App\Http\Requests\Admin\UpdateNumber;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numbers = Number::orderBy('created_at', 'DESC')->get();
        return view('admin.number.index', compact('numbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.number.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\Admin\CreateNumber  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNumber $request)
    {
         $data = $request->all();

        if (Number::create($data)) {
            return redirect()->route('number.index')->with('message', "Number created successfully");
        }
        return redirect()->route('number.index')->with('message', "Unable to create number.");
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
        $number = Number::find($id);

        return view('admin.number.edit', compact('number'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateNumber  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNumber $request, $id)
    {
        $number = Number::find($id);
        $data = $request->all();
        
        if ($number->update($data)) {
            return redirect()->route('number.index')->with('message', "changed successfully!!!");
        }
        return redirect()->route('number.index')->with('message', "changed no successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $number = Number::find($id);

         if ($number->delete()) {
             return redirect()->route('number.index')->with('message', "Number deleted successfully");
         }
         return redirect()->route('number.index')->with('message', "Unable to delete number");
    }
}
