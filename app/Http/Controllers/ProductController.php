<?php

namespace App\Http\Controllers;

use App\Models\product;
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
        $products = Product::paginate(15);
        return Inertia::render(
            'Products/Index',
            [
                'products' => $products->items(),
                'pagination' => $products->links()->pagination
            ]
        );
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required',
        ]);

        $product = new Product($request->input());
        $product->save();
        return redirect('products');
    }

    public function edit(product $product)
    {
        return Inertia::render('Products/Edit', ['product' => $product]);
    }

    public function update(Request $request, product $product)
    {
        $request->validate([
            'product' => 'required',
        ]);
        $product->update($request->all());
        return redirect('products');
    }

    public function destroy(product $product)
    {
        $product->delete();
        return redirect('products');
    }

    public function show(product $product)
    {
        //
    }
}
