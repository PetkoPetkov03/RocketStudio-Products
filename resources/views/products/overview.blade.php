<div>
    @include('modules.status')

    @php($overview = $response->responseBody)

    @foreach ($overview->get_products() as $product)
        <p>Product: {{ $product->name }}</p>
        <p>Price per unit: {{ $product->price }}</p>
        <p>Quantity: {{ $product->quantity }}</p>
        <p>Overall product stock value: {{ $overview->get_overall_price($product->name) }}
    @endforeach

    <p>Overall stock value {{ $overview->get_stock_value() }}</p>
</div>
