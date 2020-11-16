<div class="navbar-default">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="menu_area alt-font">
                    <nav class="navbar navbar-expand-lg navbar-light no-padding">
                        <div class="navbar-header navbar-header-custom float-left">
                            <a href="{{route('web.home', app()->getLocale())}}" class="navbar-brand logodefault">
                                <img id="logo" src="{{ asset('img/admin-logo.png') }}" alt="logo">
                            </a>
                        </div>

                        <div class="navbar-toggler align-items-center"></div>

                        <ul class="navbar-nav ml-auto align-items-center" id="nav" style="display: none;">

                            <li class="{{ request()->route()->getName() == 'web.home' ? 'current' : '' }}">
                                <a href="{{route('web.home', app()->getLocale())}}" class="nav-item nav-link">
                                    {{__('Home')}}
                                </a>
                            </li>

                            <li class="{{ request()->route()->getName() == 'web.events' || request()->route()->getName() == 'web.event' ? 'current' : '' }}">
                                <a href="{{route('web.events', app()->getLocale())}}" class="nav-item nav-link">
                                    {{__('Events')}}
                                </a>
                            </li>

                            <li class="{{ request()->route()->getName() == 'web.contact' ? 'current' : '' }}">
                                <a href="{{route('web.contact', app()->getLocale())}}" class="nav-item nav-link">
                                    {{__('Contact')}}
                                </a>
                            </li>

                            <li class="{{ request()->route()->getName() == 'web.calendar' ? 'current' : '' }}">
                                <a href="{{route('web.calendar', [app()->getLocale(), date('Y-m-d')])}}" class="nav-item nav-link">
                                    {{ __('Calendar') }}
                                </a>
                            </li>

                        </ul>

                        <ul class="navbar-nav ml-auto align-items-center" id="nav" style="display: none;">

                            <li>
                                <a href="{{route('login', app()->getLocale())}}" class="nav-item nav-link">
                                    {{__('Login')}}
                                </a>
                            </li>

                            <li>
                                <a href="{{route('register', app()->getLocale())}}" class="nav-item nav-link">
                                    {{__('Register')}}
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                    <i class="far fa-flag"></i>
                                    {{app()->getLocale()}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if( isset($event) )
                                        <a href="{{route(Route::currentRouteName(), ['language' => 'sk', 'slug' => $event->slug_sk])}}" class="{{ app()->getLocale() == 'sk' ? 'current' : '' }} dropdown-item">SK</a>
                                        <a href="{{route(Route::currentRouteName(), ['language' => 'en', 'slug' => $event->slug_en])}}" class="{{ app()->getLocale() == 'en' ? 'current' : '' }} dropdown-item">EN</a>
                                    @else()
                                        <a href="{{route(Route::currentRouteName(), ['language' => 'sk'])}}" class="{{ app()->getLocale() == 'sk' ? 'current' : '' }} dropdown-item">SK</a>
                                        <a href="{{route(Route::currentRouteName(), ['language' => 'en'])}}" class="{{ app()->getLocale() == 'en' ? 'current' : '' }} dropdown-item">EN</a>
                                    @endif
                                </div>
                            </li>

                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
