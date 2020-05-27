@if (Session::has('msg'))
    <p class="alert alert-info">{{ Session::get('msg') }}</p>
@endif

@if (Session::has('error'))
    <p class="alert alert-warning">{{ Session::get('error') }}</p>
@endif

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
@endif