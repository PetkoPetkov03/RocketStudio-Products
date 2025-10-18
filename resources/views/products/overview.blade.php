@extends('templates.base')

@section('style')
    <link rel="stylesheet" href="{{ asset("css/table.css") }}">
    <link rel="stylesheet" href="{{ asset("css/buttons.css") }}"
@endsection

@section('content')
    <div class="display">
        <button style="width: 20%;" class="button secondary" onclick='history.back()'>Back</button>
        @include('modules.status')

        @php($overview = $response->responseBody)

        <table>
            <tr>
                <th>Product</th>
                <th>Price per unit</th>
                <th>Quantity</th>
                <th>Overall product value</th>
            </tr>
            @foreach ($overview->get_products() as $product)
                <tr>
                    
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $overview->get_overall_price($product->name) }}</td>
                </tr>
            @endforeach
            <tr>
                <td>Overall stock value: {{ $overview->get_stock_value() }}</td>
            </tr>
        </table>
    </div>
@endsection
