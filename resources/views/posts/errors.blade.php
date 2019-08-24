@if ($errors->has($input))
    <span class="text-red" role="alert">
        <strong>{{ $errors->first($input) }}</strong>
    </span>
@endif
