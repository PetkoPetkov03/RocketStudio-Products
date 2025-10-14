<div class="display">
    <div class="container">
        <a href="/products/create"><button>Add Product</button></a>
            
        @foreach ($products as $product)
            <p>Product Name: {{ $product->name }}</p>
            <p>{{ $product->quantity }} left  price: {{ $product->price }}$</p>
        @endforeach
    </div>
</div>
