<?php

namespace App\Http\Controllers;

use App\Models\input;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\reference;
use App\Models\product;
use App\Models\presentation;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inputs = input::with('references', 'products', 'presentatios')->paginate(10);

        return Inertia::render(
            'Inputs/Index',
            compact('inputs')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $references = Reference::all();
        $products = Product::all();
        $presentations = Presentation::all();

        return Inertia::render('Inputs/Create', compact('references', 'products', 'presentations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reference_id' => 'required',
            'product_id' => 'required',
            'presentation_id' => 'required',
            'quantity' => 'required', 'int'
        ]);

        $input = new Input($request->input());
        $input->save();

        return redirect('inputs');
    }


    /**
     * Display the specified resource.
     */
    public function show(input $input)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(input $input)
    {
        $reference = Reference::all();
        $product = Product::all();
        $presentation = Presentation::all();

        return Inertia::render('Inputs/Edit', compact('reference', 'product', 'preentation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, input $input)
    {
        $request->validate([
            'reference_id' => 'required',
            'product_id' => 'required',
            'presentation' => 'required',
            'quantity' => 'required' | 'int',
        ]);

        $input->update($request->all());
        return redirect('Inputs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(input $input)
    {
        $input->delete();
        return redirect('Inputs');
    }
}
