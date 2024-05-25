<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'latestProducts' => Product::query()
                ->latest()
                ->get(),
            'latestOrders' => Order::query()
                ->latest()
                ->with('product')
                ->get(),
        ]);
    }
}
