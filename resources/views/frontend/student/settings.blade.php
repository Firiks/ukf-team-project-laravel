@extends('layout.student')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="text-center section-heading">
                <h1>Nastavenia</h1>
            </div>
        @if(session()->has('error'))
            <div class="error-message">{{ session()->get('message') }}</div>
        @endif
        @if(session()->has('success'))
            <div class="success-message">{{ session()->get('message') }}</div>
        @endif

        <form method="post" action="{{route('student.update', app()->getLocale())}}" enctype="multipart/form-data">
            @csrf
        <div class="tab-content mb-4">

            <div class="row flex-row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" value="{{ old("username", isset($user) ? $user->{"username"} : '') }}" class="form-control {{ $errors->has("username") ? 'parsley-error' : '' }}">
                        @include('admin._partials._errors', ['column' => "username"])
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Meno</label>
                        <input name="name" type="text" value="{{ old("name", isset($user) ? $user->{"name"} : '') }}" class="form-control {{ $errors->has("name") ? 'parsley-error' : '' }}">
                        @include('admin._partials._errors', ['column' => "name"])
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" value="{{ old("email", isset($user) ? $user->{"email"} : '') }}" class="form-control {{ $errors->has("email") ? 'parsley-error' : '' }}">
                        @include('admin._partials._errors', ['column' => "email"])
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Heslo</label>
                        <input name="password" type="password" value="{{ old("password") }}" class="form-control {{ $errors->has("password") ? 'parsley-error' : '' }}">
                        @include('admin._partials._errors', ['column' => "password"])
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="password-confirm">{{ __('Confirm password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

        </div>
        </form>
        </div>
    </div>
@endsection
