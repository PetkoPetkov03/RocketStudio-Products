<div class="display">
    @include('modules.status')
    <div class="container">
        <a href="/products/create"><button>Add Product</button></a>
        <a href="/products/buy"><button>Buy Product</button></a>
        <a href="/products/overview"><button>View Stock</button></a>
            
        @foreach ($products as $product)
            <p>Product Name: {{ $product->name }}</p>
            <p>{{ $product->quantity }} left  price: {{ $product->price }}$</p>

            <a href="/products/{{ $product->id }}"><button>Show</button></a>
        @endforeach
    </div>
</div>
