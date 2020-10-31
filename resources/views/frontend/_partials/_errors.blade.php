@if($errors->has($column))
    <ul style="margin: 0;">
        <li class="error-color">
            {{ $errors->first($column) }}
        </li>
    </ul>
@endif
