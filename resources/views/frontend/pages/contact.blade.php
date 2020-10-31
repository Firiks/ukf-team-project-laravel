@extends('layout.frontend')

@section('content')
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="img/bg/bg9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading">
                    <h1>{{__('Contact')}}</h1>
                    <div class="col-md-12">
                        <ul>
                            <li>
                                <a href="{{ route('web.home', app()->getLocale()) }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    {{ __('Contact') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="text-center section-heading">
                <h3>{{ __('If you have any questions just contact us') }}</h3>
            </div>

            <div class="d-flex justify-content-center margin-50px-bottom sm-margin-30px-bottom">
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box"><i class="fas fa-phone"></i>
                        <h4>{{ __('Call us') }}</h4>
                        <span>+421 944 269 291</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box"><i class="fas fa-map-marker-alt"></i>
                        <h4>{{ __('Residence') }}</h4>
                        <span>Trieda Andreja Hlinku 1, 949 01 Nitra</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box"><i class="far fa-envelope"></i>
                        <h4>{{ __('Email us') }}</h4>
                        <span>matejmozola1@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(isset($error))
                        <div class="error-message">{{ $error }}</div>
                    @endif
                    @if(isset($success))
                        <div class="success-message">{{ $success }}</div>
                    @endif
                    @if(isset($scroll) || $errors->any())
                        <div id="scroll-to-form"></div>
                    @endif
                    <form method="post" action="{{ route('web.contact.post', app()->getLocale()) }}" class="mailform off2">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                @include('frontend._partials._errors', ['column' => 'name'])
                                <input type="text" name="name" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'error-border' : '' }}" placeholder="{{ __('Your name') }}">
                            </div>
                            <div class="col-md-6">
                                @include('frontend._partials._errors', ['column' => 'phone'])
                                <input type="text" name="phone" value="{{ old('phone') }}" class="{{ $errors->has('phone') ? 'error-border' : '' }}" placeholder="{{ __('Your phone') }}">
                            </div>
                            <div class="col-md-6">
                                @include('frontend._partials._errors', ['column' => 'email'])
                                <input type="text" name="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'error-border' : '' }}" placeholder="{{ __('Your email') }}">
                            </div>
                            <div class="col-md-12">
                                @include('frontend._partials._errors', ['column' => 'message'])
                                <textarea name="message" rows="5" class="{{ $errors->has('message') ? 'error-border' : '' }}" placeholder="{{ __('Leave us a message') }}">{{ old('message') }}</textarea>
                            </div>
                            <div class="mfControls col-md-12">
                                <button type="submit" class="send-btn">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

@endsection
