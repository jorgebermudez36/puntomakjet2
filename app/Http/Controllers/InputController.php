<?php

namespace App\Http\Controllers;

use App\Models\input;
use App\Models\supply;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;


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
        $presentations = \App\Models\Presentation::all();
        $products = \App\Models\Product::all();
        return Inertia::render('Inputs/Create', compact('presentations', 'products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reference_id' => 'required',
            'product_id' => 'required',
            'presentation_id' => 'required',
            'quantity' => 'required|Integer',

        ]);

        $input = Input::create($validatedData);

        // Retrieve the corresponding supply record based on reference_id, product_id, and presentation_id
        $supply = Supply::where(['reference_id' => $input->reference_id, 'product_id' => $input->product_id, 'presentation_id' => $input->presentation_id])->first();

        if ($supply) {
            // Update the stock in the supplies table
            $newStock = $supply->stock + $input->quantity;
            $supply->stock = $newStock;
            $supply->save();
        } else {
            // Create a new supply record if it doesn't exist
            $supply = Supply::create(['reference_id' => $request->reference_id, 'product_id' => $request->product_id, 'presentation_id' => $request->presentation_id, 'stock' => $request->quantity]);
        }
        return redirect('inputs');
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
