<div class="row mb-3">
    <div class="col-sm-12 col-md-9">
        @include('admin._partials._lang_tabs')

        <div class="tab-content mb-4">
            @foreach(config('settings.languages') as $key => $lang)
                <div class="tab-pane p-3 {{ $loop->first ? 'active' : '' }}" id="{{ $key }}" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Názov {{ strtoupper($key) }}</label>
                                <input name="name_{{ $key }}" type="text" value="{{ old("name_$key", isset($file) ? $file->{"name_$key"} : '') }}" class="form-control {{ $errors->has("name_$key") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "name_$key"])
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Súbor</label>
                    <input name="file" type="file" value="{{ old('file', isset($file) ? $file->file : '') }}" class="form-control filestyle {{ $errors->has('file') ? 'parsley-error' : '' }}" data-buttonname="btn-secondary">
                    @include('admin._partials._errors', ['column' => 'file'])
                </div>
            </div>
        </div>

    </div>
</div>
