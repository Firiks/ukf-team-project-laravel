@if($errors->has($column))
    <ul class="parsley-errors-list filled">
        <li class="parsley-required">
            {{ $errors->first($column) }}
        </li>
    </ul>
@endif