<?php

namespace App\Http\Controllers;

use App\Models\presentation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PresentationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $presentations = Presentation::all();
        /* return $presentation; */
        return Inertia::render(
            'Presentations/Index',
            ['presentations' => $presentations]
        );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Presentations/Create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate([
            'presentation' => 'required',
        ]);

        $presentation = new Presentation($request->input());
        $presentation->save();
        return redirect('presentations');
    }
    /**
     * Display the specified resource.
     */
    public function show(presentation $presentation)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(presentation $presentation)
    {
        return Inertia::render('Presentations/Edit', ['presentation' => $presentation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, presentation $presentation)
    {
        $request->validate([
            'presentation' => 'required',
        ]);
        $presentation->update($request->all());
        return redirect('presentations');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(presentation $presentation)
    {
        $presentation->delete();
        return redirect('presentations');
    }
}
