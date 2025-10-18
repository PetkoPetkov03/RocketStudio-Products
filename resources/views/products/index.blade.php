@extends('templates.base')

@section('style')
    <link rel="stylesheet" href="{{ asset("css/table.css") }}">
    <link rel="stylesheet" href="{{ asset("css/index.css") }}">
    <link rel="stylesheet" href="{{ asset("css/buttons.css") }}">
@endsection

@section('content')
    <div class="display">
        @include('modules.status')
        <div class="container">
            <a href="{{ route('products.create') }}"><button class="button">Add Product</button></a>
            <a href="{{ route('products.buy') }}"><button class="button">Buy Product</button></a>
            <a href=" {{ route('products.overview') }} "><button class="button">View Stock</button></a>
            
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }} left </td>
                        <td>{{ $product->price }}$</td>

                        <td><a href="{{ route('products.get', $product->id) }}"><button class="button secondary">Show</button></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
