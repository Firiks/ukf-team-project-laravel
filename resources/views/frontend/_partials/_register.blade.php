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
                    <a href="{{route('web.home', app()->getLocale())}}" class="logo logo-admin">
                        <img src="{{ asset('img/admin-logo-mark.png') }}" height="100" alt="logo">
                    </a>
                </h3>
                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Registrácia</h4>

                    <form action="{{ url('register') }}" method="post" class="form-horizontal m-t-30">
                        @csrf
                        <div class="form-group">
                            <label for="name">Meno a priezvisko</label>
                            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'parsley-error' : '' }}" id="name" placeholder=" ">

                            @include('frontend._partials._errors', ['column' => 'name'])
                        </div>
                        <div class="form-group">
                            <label for="username">Prihlasovacie meno</label>
                            <input name="username" type="text" class="form-control {{ $errors->has('username') ? 'parsley-error' : '' }}" id="p_name" placeholder=" ">

                            @include('frontend._partials._errors', ['column' => 'username'])
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input name="email" type="text" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder=" ">

                            @include('frontend._partials._errors', ['column' => 'email'])
                        </div>

                        <div class="form-group">
                            <label for="password">Heslo</label>
                            <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" id="password" placeholder=" ">

                            @include('frontend._partials._errors', ['column' => 'password'])
                        </div>
                        <div class="form-group">
                            <label for="password">Zopakujte heslo</label>
                            <input name="r_password" type="password" class="form-control {{ $errors->has('r_password') ? 'parsley-error' : '' }}" id="r_password" placeholder=" ">

                            @include('frontend._partials._errors', ['column' => 'r_password'])
                        </div>
                        <div class="form-group">
                            <label for="student">Študent / Učiteľ</label>
                            <select name="student" id="student" class="form-control">
                                <option value="0">Študent</option>
                                <option value="1">Učiteľ</option>
                            </select>
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-8 text-right">
                                <button class="btn btn-success w-md waves-effect waves-light" type="submit">
                                    Registrovať <i class="fa fa-user-plus"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
