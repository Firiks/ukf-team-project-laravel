<div class="row mb-3">
    <div class="col-sm-12 col-md-9">
        @include('admin._partials._lang_tabs')

        <div class="tab-content mb-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Meno</label>
                                <input name="name" type="text" value="{{ old("name", isset($user) ? $user->{"name"} : '') }}" class="form-control {{ $errors->has("name") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "name_$key"])
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" value="{{ old("email", isset($user) ? $user->{"email"} : '') }}" class="form-control {{ $errors->has("email") ? 'parsley-error' : '' }}">

                                @include('admin._partials._errors', ['column' => "description_$key"])
                            </div>
                        </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Heslo</label>
                            <input name="password" type="text" value="{{ @decrypt(old("password", isset($user) ? $user->{"password"} : '')) }}" class="form-control {{ $errors->has("password") ? 'parsley-error' : '' }}">

                            @include('admin._partials._errors', ['column' => "description_$key"])
                        </div>
                    </div>
            </div>
                </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Pracovisko</label>
                    <select name="workplace_id" class="form-control">
                        <option value="">Vyberte pracovisko</option>
                        @foreach($workplaces as $workplace)
                            <option value="{{ $workplace->id }}" {{ old('workplace_id') == $workplace->id ? 'selected' : (isset($user) && $workplace_id == $workplace->id ? 'selected' : '') }}>
                                {{ $category->name_sk }}
                            </option>
                        @endforeach
                    </select>
                    @include('admin._partials._errors', ['column' => 'workplace_id'])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Avatar</label>
                    <input name="image" type="file" value="{{ old('image', isset($user) ? $user->image : '') }}" class="form-control filestyle {{ $errors->has('image') ? 'parsley-error' : '' }}" data-buttonname="btn-secondary">
                    @include('admin._partials._errors', ['column' => 'image'])
                </div>
            </div>
        </div>



    </div>

