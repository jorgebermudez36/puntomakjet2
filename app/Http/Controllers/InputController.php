<?php

namespace App\Http\Controllers;

use App\Models\input;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InputController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inputs = Input::with(['product', 'presentation'])->paginate();
        return Inertia::render('Inputs/Index', compact('inputs'));
    }

    public function create()
    {
        return Inertia::render('Inputs/Create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(input $input)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(input $input)
    {
        return Inertia::render('Inputs/Edit', ['inputs' => $input]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, input $input)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(input $input)
    {
        $input->delete();
        return redirect('inputs');
    }
}
