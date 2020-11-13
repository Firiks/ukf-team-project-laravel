@extends('layout.auth')

@section('content')
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <div class="col-2 text-left">
                    <a href="{{route('web.home', app()->getLocale())}}">
                        <button class="btn btn-primary w-md waves-effect waves-light">
                            <i class="fa fa-arrow-left"></i> Späť
                        </button>
                    </a>
                </div>
                <h3 class="text-center m-0">
                    <a href="{{ route('dashboard.index') }}" class="logo logo-admin">
                        <img src="{{ asset('img/admin-logo-mark.png') }}" height="100" alt="logo">
                    </a>
                </h3>
                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Prihlásenie</h4>

                    <form action="{{ url('login') }}" method="post" class="form-horizontal m-t-30">
                        @csrf

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input name="email" type="text" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder=" ">

                            @include('admin._partials._errors', ['column' => 'email'])
                        </div>

                        <div class="form-group">
                            <label for="password">Heslo</label>
                            <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" id="password" placeholder=" ">

                            @include('admin._partials._errors', ['column' => 'password'])
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input name="remember" type="checkbox" class="custom-control-input" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customControlInline">
                                        Zostať prihlásený
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-info w-md waves-effect waves-light" type="submit">
                                    Prihlásiť <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
