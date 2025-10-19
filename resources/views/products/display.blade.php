@extends("templates.base")

@section('style')
    <link rel="stylesheet" href="{{ asset('css/display.css') }}">
@endsection()

@section('content')
    <div class="display">
        <div class="show-card">
            <div class="card-title">
                <h1>Product: {{ $product->name }}</h1>
            </div>
            <p class="price">{{ $product->price }}$</p> <p class="quantity">{{ $product->quantity }} left</p>
        </div>
    </div>

@endsection
