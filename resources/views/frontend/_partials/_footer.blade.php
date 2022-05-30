<footer>
    <div class="container">
        <div class="row d-flex flex-row justify-content-center">

            <div class="col-lg-4 col-md-6 sm-margin-30px-bottom">
                <a href="{{route('web.home', app()->getLocale())}}">
                    <img alt="footer-logo" src="{{ asset('img/admin-logo-white.png') }}" style="max-width: 200px;">
                </a>
            </div>

            <div class="col-lg-2 col-md-6 sm-margin-30px-bottom">
                <h3 class="text-white">
                    {{ __('Quick links') }}
                </h3>
                <ul class="footer-list">
                    <li>
                        <a href="{{ route('web.events', app()->getLocale()) }}">
                            {{__('Events')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('web.contact', app()->getLocale()) }}">
                            {{ __('Contact') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('web.calendar', app()->getLocale()) }}">
                            {{ __('Calendar') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3 class="text-white">
                    {{ __('Contact information') }}
                </h3>
                <p class="text-light-gray margin-20px-bottom">
                    Trieda Andreja Hlinku 1
                    <br>949 01 Nitra
                    <br>matejmozola1@gmail.com
                    <br>+421 944 269 291
                </p>
            </div>
        </div>

    </div>
    <div class="footer-bar">
        <div class="container">
            <p>
                &copy; {{ Carbon\Carbon::now()->year }}
                {{__('Team project')}} | {{ __('All rights reserved') }} | {{__('Created by Team 2')}}
            </p>
        </div>
    </div>
</footer>
