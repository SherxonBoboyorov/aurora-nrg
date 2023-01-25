<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateSlider;
use App\Http\Requests\Admin\UpdateSlider;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateSlider  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlider $request)
    {
        $data = $request->all();
        $data['image'] = Slider::uploadImage($request);

        if (Slider::create($data)) {
            return redirect()->route('slider.index')->with('message', "Slider created successfully");
        }

        return redirect()->route('slider.index')->with('message', 'Unable to create slider');
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
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Request\Admin\UpdateSlider  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlider $request, $id)
    {
        $slider = Slider::find($id);

        $data = $request->all();
        $data['image'] = Slider::updateImage($request, $slider);

        if ($slider->update($data)) {
            return redirect()->route('slider.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('slider.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if (!Slider::find($id)) {
            return redirect()->route('slider.index')->with('message', "Slider not found");
        }

        $slider = Slider::find($id);

        if (File::exists(public_path() . $slider->image)) {
            File::delete(public_path() . $slider->image);
        }

        if ($slider->delete()) {
            return redirect()->route('slider.index')->with('message', "Slider deleted successfully");
        }

        return redirect()->route('slider.index')->with('message', "Unable to delete slider");
    }
}
