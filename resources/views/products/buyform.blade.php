<div>
    @include('modules.status')
    <form method='POST' action='/products/buy'>
        @csrf
        <input type="text" name='pname' placeholder='Product name' required />
        <input type="number" name="pquantity" placeholder='Quantity' required />

        <select name='operation'>
            <option value="buy">Sell</option>
            <option value="lower">Decrese Quantity</option>
        </select>
        <button>Finish Operation</button>
    </form>
</div>
