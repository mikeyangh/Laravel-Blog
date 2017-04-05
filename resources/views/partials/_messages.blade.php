@if (Session::has('success'))

    <div class="alert alert-success" role="alert">
        <Strong>Success:</Strong> {{ Session::get('success') }}
    </div>

@endif

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <Strong>Errors:</Strong>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>

@endif