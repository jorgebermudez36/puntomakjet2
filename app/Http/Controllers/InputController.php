<?php

namespace App\Http\Controllers;

use App\Models\input;
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


        $request->validate([
            'reference_id' => 'required',
            'product_id' => 'required',
            'presentation_id' => 'required',
            'quantity' => 'required|Integer',

        ]);

        /* $validatedData['total_quantity'] = DB::raw("total_quantity + {ValidatedData['quantity']}"); */

        $inputs = new Input($request->input());
        $inputs->save();

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

    public function sum()
    {
        $total_quantity = Input::sum('cantidad');
        return Inertia::render('Inputs/Sum', compact('total_quantity'));
    }
}
