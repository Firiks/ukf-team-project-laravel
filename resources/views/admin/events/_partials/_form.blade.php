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
                                <input name="name_{{ $key }}" type="text" value="{{ old("name_$key", isset($event) ? $event->{"name_$key"} : '') }}" class="form-control {{ $errors->has("name_$key") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "name_$key"])
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Popis {{ strtoupper($key) }}</label>
                                <textarea name="description_{{ $key }}" class="form-control {{ $errors->has("description_$key") ? 'parsley-error' : '' }}">{{ old("description_$key", isset($event) ? $event->{"description_$key"} : '') }}</textarea>
                                <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                                @include('admin._partials._errors', ['column' => "description_$key"])
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Kategória</label>
                    <select name="event_category_id" class="form-control">
                        <option value="">Vyberte kategóriu</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('event_category_id') == $category->id ? 'selected' : (isset($event) && $event->event_category_id == $category->id ? 'selected' : '') }}>
                                {{ $category->name_sk }}
                            </option>
                        @endforeach
                    </select>
                    @include('admin._partials._errors', ['column' => 'event_category_id'])
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>Fakulta</label>
                    <select name="faculty_id" class="form-control">
                        <option value="">Vyberte fakultu</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : (isset($event) && $event->faculty_id == $faculty->id ? 'selected' : '') }}>
                                {{ $faculty->name_sk }}
                            </option>
                        @endforeach
                    </select>
                    @include('admin._partials._errors', ['column' => 'faculty_id'])
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Pracovisko</label>

                    @if (Auth::user()->admin == 0)
                        @foreach($workplaces as $workplace)
                            @if ($workplace->id == Auth::user()->workplace_id)
                                <input type="hidden" name="workplace_id" value="{{ $workplace->id }}">
                                <input type="text" class="form-control" placeholder="{{ $workplace->name_sk }}" readonly>
                            @endif
                        @endforeach
                    @else
                        <select name="workplace_id" class="form-control">
                            <option value="">Vyberte pracovisko</option>
                            @foreach($workplaces as $workplace)
                                <option value="{{ $workplace->id }}" {{ old('workplace_id') == $workplace->id ? 'selected' : (isset($event) && $event->workplace_id == $workplace->id ? 'selected' : '') }}>
                                    {{ $workplace->name_sk }}
                                </option>
                            @endforeach
                        </select>
                    @endif

                    @include('admin._partials._errors', ['column' => 'workplace_id'])
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Učebna</label>
                    <select name="room_id" class="form-control">
                        <option value="">Vyberte učebňu</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : (isset($event) && $event->room_id == $room->id ? 'selected' : '') }}>
                                {{ $room->name_sk }}
                            </option>
                        @endforeach
                    </select>
                    @include('admin._partials._errors', ['column' => 'room_id'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Dátum a čas</label>
                    <input name="date" type="datetime-local" value="{{ old("date", isset($event) ? date('Y-m-d\TH:i', strtotime($event->date)) : '') }}" class="form-control" {{ $errors->has("date") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "date"])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Počet účastníkov</label>
                    <input name="participants_max" type="text" value="{{ old("participants_max", isset($event) ? $event->{"participants_max"} : '') }}" class="form-control {{ $errors->has("participants_max") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "participants_max"])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Verejná</label>
                    <div class="form-group">
                        <input name="public" type="range" id="public" min="0" max="1" class="form-control-range w-30" value="{{ old("public", isset($event) ? $event->{"public"} : '') }} {{ $errors->has("public") ? 'parsley-error' : '' }}">
                        @include('admin._partials._errors', ['column' => "public"])
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Obrázok</label>
                    <input name="image" type="file" value="{{ old('image', isset($event) ? $event->image : '') }}" class="form-control filestyle {{ $errors->has('image') ? 'parsley-error' : '' }}" data-buttonname="btn-secondary">
                    @include('admin._partials._errors', ['column' => 'image'])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Obrázky udalosti</label>
                    <input name="images[]" type="file" class="form-control filestyle {{ $errors->has('images[]') ? 'parsley-error' : '' }}" data-buttonname="btn-secondary" multiple>
                    @include('admin._partials._errors', ['column' => 'images'])
                </div>
            </div>
        </div>

    </div>
</div>
