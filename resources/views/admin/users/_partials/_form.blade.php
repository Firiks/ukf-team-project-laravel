<div class="row mb-3">
    <div class="col-sm-12 col-md-9">

        <div class="tab-content mb-4">

                    <div class="row flex-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" type="text" value="{{ old("username", isset($user) ? $user->{"username"} : '') }}" class="form-control {{ $errors->has("username") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "username"])
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Meno</label>
                                <input name="name" type="text" value="{{ old("name", isset($user) ? $user->{"name"} : '') }}" class="form-control {{ $errors->has("name") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "name"])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" value="{{ old("email", isset($user) ? $user->{"email"} : '') }}" class="form-control {{ $errors->has("email") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "email"])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Heslo</label>
                                <input name="password" type="text" value="{{ old("password", isset($user) ? $user->{"password"} : '') }}" class="form-control {{ $errors->has("password") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "password"])
                            </div>
                        </div>
                    </div>

                    <label>Typ užívatela</label>
                    <div class="row flex-row col-sm-6">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="student" type="range" id="student" min="0" max="1" class="form-control-range w-30" value="{{ old("student", isset($user) ? $user->{"student"} : '') }} {{ $errors->has("student") ? 'parsley-error' : '' }}">
                                <label for="student">Študent</label>
                                @include('admin._partials._errors', ['column' => "student"])
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="pracovnik" type="range" id="pracovnik" min="0" max="1" class="form-control-range w-30" value="{{ old("pracovnik", isset($user) ? $user->{"pracovnik"} : '') }} {{ $errors->has("pracovnik") ? 'parsley-error' : '' }}">
                                <label for="pracovnik">Pracovník</label>
                                @include('admin._partials._errors', ['column' => "pracovnik"])
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="admin" type="range" id="admin" min="0" max="1" class="form-control-range w-30" value="{{ old("admin", isset($user) ? $user->{"admin"} : '') }} {{ $errors->has("admin") ? 'parsley-error' : '' }}">
                                <label for="admin">Admin</label>
                                @include('admin._partials._errors', ['column' => "admin"])
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="super_admin" type="range" id="super_admin" min="0" max="1" class="form-control-range w-30" value="{{ old("super_admin", isset($user) ? $user->{"super_admin"} : '') }} {{ $errors->has("super_admin") ? 'parsley-error' : '' }}">
                                <label for="super_admin">Super Admin</label>
                                @include('admin._partials._errors', ['column' => "super_admin"])
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
                                        <option value="{{ $workplace->id }}" {{ old('workplace_id') == $workplace->id ? 'selected' : (isset($user) && $user->workplace_id == $workplace->id ? 'selected' : '') }}>
                                            {{ $workplace->name_sk }}
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

    </div>

</div>
