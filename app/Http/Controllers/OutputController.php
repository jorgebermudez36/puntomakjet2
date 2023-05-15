<?php

namespace App\Http\Controllers;

use App\Models\output;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OutputController extends Controller
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
        $outputs = Output::with(['product', 'presentation'])->paginate();
        return Inertia::render('Outputs/Index', compact('outputs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Outputs/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(output $output)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(output $output)
    {
        return Inertia::render('Outputs/Edit', ['outputs' => $output]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, output $output)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(output $output)
    {
        $output->delete();
        return redirect('outputs');
    }
}
