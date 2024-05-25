<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProductsController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request) {

        Product::query()->create($request->validated());

        return redirect()->route('home');
    }

    public function edit(Product $product) {
        return view('products.create', [
            'product'           => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product){
        $product->update($request->validated());
        return redirect()->route('home');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('home');
    }
}
