<div>
    @include('modules.status')
    <div class="hidden" id="cproduct-form">
        <form method="post" action="/products/create">
            @csrf

            <input type="text" name="pname" placeholder="Product name"/>
            <input type="number" name="pprice" placeholder="price"/>
            <input type="number" name="pquantity" placeholder="quantity" />

            <button type="submit">Create Product!</button>
        </form>
    </div>
</div>
