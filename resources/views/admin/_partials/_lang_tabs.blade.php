@php($error_string = implode('|', $errors->keys()))

<ul class="nav nav-tabs" role="tablist">
    @foreach(config('settings.languages') as $key => $lang)
    <li class="nav-item">
        <a class="nav-link {{ $loop->first ? 'active' : '' }} {{ strpos($error_string, '_' . $key) != false ? 'error-color' : '' }}" data-toggle="tab" href="#{{ $key }}" role="tab">
            @if(strpos($error_string, '_' . $key) != false)
                <i class="fas fa-exclamation-triangle"></i>
            @endif
            {{ $lang }}
        </a>
    </li>
    @endforeach
</ul>
