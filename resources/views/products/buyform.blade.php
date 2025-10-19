@extends('templates.base')

@section('script')
     <script src="{{ asset("js/validate.js") }}"></script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
    <link rel='stylesheet' href="{{ asset('css/form.css') }}">
@endsection

@section('content')
    <div class="display">
        @include('modules.status')
        <button style="width: 20%;margin-bottom: 10px;" class="button secondary" onclick='history.back()'>Back</button>
        <div class="form-container">
            <h1>Buy Product</h1>
            <form class="form" method='POST' action='{{ route("products.buy.action") }}'>
                @csrf
                <div class="input-field">
                    <input class="validate" type="text" name='pname' placeholder='Product name' required />
                    <input class="validate" type="number" name="pquantity" placeholder='Quantity' required />

                    <br>
                    <select class="select" name='operation'>
                        <option value="buy">Sell</option>
                        <option value="lower">Decrese Quantity</option>
                    </select>
                </div>
                <button id="form" class="button">Finish Operation</button>
            </form>
        </div>
        @include('modules.feedback')
    </div>
@endsection
