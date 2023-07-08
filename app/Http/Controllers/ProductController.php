<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\reference;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /* return $products = Product::paginate(); */ // This is the only line that changes 
        $products = Product::paginate();

        return Inertia::render(
            'Products/Index',
            compact('products')
        );
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $product = new Product($request->input());
        $product->save();
        return redirect('products');
    }

    public function show(product $product)
    {
        //
    }

    public function edit(product $product)
    {
        return Inertia::render('Products/Edit', compact('product'));
    }

    public function update(Request $request, product $product)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $product->update($request->all());
        return redirect('products');
    }

    public function destroy(product $product)
    {
        $product->delete();
        return redirect('products');
    }
}
