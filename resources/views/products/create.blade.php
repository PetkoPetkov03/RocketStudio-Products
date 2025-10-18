@extends('templates.base')

@section('style')
    <link rel="stylesheet" href="{{ asset("css/buttons.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/form.css") }}" />
@endsection

@section('script')
    <script src="{{ asset("js/validate.js") }}"></script>
@endsection

@section('content')
    <div class="display">
        
        @include('modules.status')
        <button style="width: 20%;margin-bottom: 10px;" class="button secondary" onclick='history.back()'>Back</button>
        <div class="form-container" id="cproduct-form">
            <h1>Create Product</h1>
            <form class="form" method="post" action="/products/create">
                @csrf

                <div class='input-field'>
                    <input class="validate" type="text" name="pname" placeholder="Product name"/>
                    <input class="validate" type="number" name="pprice" placeholder="price"/>
                    <input class="validate" type="number" name="pquantity" placeholder="quantity" />
                </div>
                <button id="form" class="button" type="submit">Create Product!</button>
            </form>
        </div>
        @include('modules.feedback')
    </div>
@endsection
