@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between">
        <div class="col-6">
            <a href="{{route('products.create')}}" class="btn btn-success">Új termék</a>
            @foreach($latestProducts as $product)
                <div class="card mt-2">
                    <h2>{{$product->name}}</h2>
                    <p>{{$product->description}}</p>
                    <small>{{$product->price}} Ft</small>

                    <div>
                        <a href="{{route('products.edit', [$product])}}" class="btn btn-warning">Szerkesztés</a>
                    </div>
                    <form action="{{route('products.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Törlés</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="col-6">
            <form action="{{route('orders.store')}}" method="POST">
                @csrf
                <label for="product">Termék:</label>
                <select name="product_id" id="product">
                    @foreach($latestProducts as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
                <br

                <label for="quantity">Mennyiség:</label>
                <input type="number" name="quantity" id="quantity">

                <label for="name">Rendelő neve:</label>
                <input type="text" name="customer_name" id="name">

                <button type="submit">Rendelés leadása</button>
            </form>

            <div class="mt-2">
                @foreach($latestOrders as $order)
                    <div class="card">
                        <p>Rendelt termék: {{$order->product->name}}</p>
                        <small>Rendelő neve: {{$order->customer_name}}</small>
                        <p>Végösszeg: {{$order->sum}} Ft</p>
                        <small>{{$order->is_completed ? 'Teljesítve' : 'Nincs teljesítve'}}</small>

                        <div>
                            <a href="{{route('orders.edit', [$order])}}" class="btn btn-success">Teljesítés</a>
                        </div>
                        <form action="{{route('orders.destroy', $order->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Törlés</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
