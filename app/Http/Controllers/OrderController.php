<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return redirect()->route('home');
    }
    public function show(){
        return redirect()->route('home');
    }

    public function store(OrderRequest $request){
        $validated = $request->validated();
//        dd($validated);
        $product = Product::query()->find($validated['product_id'])->get()->pluck('price');
//        dd($product);

        $validated['sum'] = $validated['quantity'] * $product[0];
        $validated['is_completed'] = false;
        unset($validated['quantity']);

        Order::query()->create($validated);

        return redirect()->route('home');
    }

    public function edit(Order $order){
        $order->update([
            "is_completed" => 1
        ]);
        return redirect()->route('home');
    }

    public function destroy(Order $order) {
        $order->delete();
        return redirect()->route('home');
    }

}
