<?php

namespace App\Http\Controllers;

use App\Models\supply;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupplyController extends Controller
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
        $supplies = Supply::with(['product', 'presentation'])->get();
        return Inertia::render('Stocks/Index', compact('supplies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(supply $supply)
    {
        return $supply;
        return Inertia::render('Stocks/Edit', compact('supply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, supply $supply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(supply $supply)
    {
        $supply->delete();
        return redirect('stocks');
    }
}
