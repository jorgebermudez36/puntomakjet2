<?php

namespace App\Http\Controllers;

use App\Models\reference;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ReferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $references = Reference::paginate();
        return Inertia::render(
            'References/Index',
            compact('references')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'References/Create'
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $reference = new Reference($request->input());
        $reference->save();
        return redirect('references');
    }

    /**
     * Display the specified resource.
     */
    public function show(reference $reference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reference $reference)
    {
        return Inertia::render(
            'References/Edit',
            compact('reference')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reference $reference)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $reference->update($request->all());
        return redirect('references');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reference $reference)
    {
        $reference->delete();
        return redirect('references');
    }
}
