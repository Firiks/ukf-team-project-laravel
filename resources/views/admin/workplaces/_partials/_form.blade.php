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
                                <input name="name_{{ $key }}" type="text" value="{{ old("name_$key", isset($workplace) ? $workplace->{"name_$key"} : '') }}" class="form-control {{ $errors->has("name_$key") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "name_$key"])
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
            <div class="pl-3">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fakulta</label>
                            <select name="faculty_id" class="form-control">
                                <option value="">Vyberte fakultu</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : (isset($workplace) && $workplace->faculty_id == $faculty->id ? 'selected' : '') }}>
                                        {{ $faculty->name_sk }}
                                    </option>
                                @endforeach
                            </select>
                            @include('admin._partials._errors', ['column' => 'workplace_id'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kód</label>
                            <input name="code" type="text" value="{{ old('code', isset($workplace) ? $workplace->code : mt_rand(100000, 999999)) }}" class="form-control {{ $errors->has('code') ? 'parsley-error' : '' }}" readonly>
                            @include('admin._partials._errors', ['column' => 'code'])
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
