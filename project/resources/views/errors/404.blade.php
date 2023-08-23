

@if (Session::has('errors'))
    <h2>
        {{ Session::get('errors') }}
    </h2>
    @else
    <h1>@lang('NOT FOUND')</h1>
@endif
