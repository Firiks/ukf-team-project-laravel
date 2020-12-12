@extends('layout.student')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Nastavenia </h4>
                    </div>
                </div>
            </div>
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
            <div class="row">
                <label for="password-confirm" class="col-sm-12">{{ __('Confirm password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Avatar</label>
                        <input name="image" type="file" value="{{ old('image', isset($user) ? $user->image : '') }}" class="form-control filestyle {{ $errors->has('image') ? 'parsley-error' : '' }}" data-buttonname="btn-secondary">
                       @include('admin._partials._errors', ['column' => 'image'])
                        @include('admin._partials._buttons')

                    </div>
                </div>
            </div>


        </div>

    </div>

</div>
@endsection
