@if (session('success'))
    <div class="alert alert-success my-5">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger my-5">
        {{ session('error') }}
    </div>
@endif
