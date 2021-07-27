@if (Session::has('success_message'))

    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>

@endif
