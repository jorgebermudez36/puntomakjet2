<?php

namespace App\Http\Controllers;

use App\Models\input;
use App\Models\supply;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;



class InputController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inputs = Input::with(['product', 'presentation', 'reference'])->paginate();
        return Inertia::render('Inputs/Index', compact('inputs'));
    }

    public function create()
    {
        $references = \App\Models\Reference::all();
        $presentations = \App\Models\Presentation::all();
        $products = \App\Models\Product::all();
        return Inertia::render('Inputs/Create', compact('presentations', 'references', 'products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reference_id' => 'required',
            'product_id' => 'required',
            'presentation_id' => 'required',
            'quantity' => 'required|Integer',

        ]);

        $validatedData['created_by'] = Auth::id();

        $input = Input::create($validatedData);

        // Retrieve the corresponding supply record based on reference_id, product_id, and presentation_id
        $supply = Supply::where(['reference_id' => $input->reference_id, 'product_id' => $input->product_id])->first();

        if ($supply) {
            // Update the stock in the supplies table
            $newStock = $input->calculateStock();
            $supply->stock = $newStock;
            $supply->save();
        } else {
            // Create a new supply record if it doesn't exist
            $supply = Supply::create(['reference_id' => $request->reference_id, 'product_id' => $request->product_id, 'stock' => $request->quantity]);
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

    public function deleteInput(input $input, $id)
    {
        $input = Input::findOrFail($id);
        // Delete the input record (soft deletion)
        $input->delete();
        return redirect('inputs');
    }
}
