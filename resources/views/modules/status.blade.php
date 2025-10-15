<div>
    @if($errors->any())
        <div class="allert allert-error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success')->successMessage }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error')->errorMessage }}
        </div>
    @endif
</div>
