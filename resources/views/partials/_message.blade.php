@if(Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
<!-- if js validation is turn off -->
@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>
@endif