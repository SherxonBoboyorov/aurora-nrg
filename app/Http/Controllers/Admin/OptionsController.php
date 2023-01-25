<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Options;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $options = Options::orderBy('created_at', 'DESC')->get();

        return view('admin.options.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.options.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'key' => 'required',
            'value' => 'required'
        ])->validate();

        Options::create($request->all());

        return redirect()->route('options.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): View|Factory|Application
    {
        $option = Options::find($id);
        return view('admin.options.edit', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $option = Options::find($id);
        return view('admin.options.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        Validator::make($request->all(), [
            'key' => 'required',
            'value' => 'required'
        ])->validate();

        $options = Options::find($id);

        $options->update($request->all());

        return redirect()->route('options.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $option = Options::find($id);

        $option->delete();

        return redirect()->route('options.index');
    }
}
