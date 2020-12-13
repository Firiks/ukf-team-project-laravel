<div class="navbar-default">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="menu_area alt-font">
                    <nav class="navbar navbar-expand-lg navbar-light no-padding">

                        <div class="navbar-toggler align-items-center"></div>

                        <ul class="navbar-nav ml-auto align-items-center" id="nav" style="display: none;">

                            <li class="{{ request()->route()->getName() == 'student.events' || request()->route()->getName() == 'student.events' ? 'current' : '' }}">
                                <a href="{{route('student.events', app()->getLocale())}}" class="nav-item nav-link">
                                    {{__('Events')}}
                                </a>
                            </li>

                            <li class="{{ request()->route()->getName() == 'student.workplaces' ? 'current' : '' }}">
                                <a href="{{route('student.workplaces', app()->getLocale())}}" class="nav-item nav-link">
                                    {{__('Workplaces')}}
                                </a>
                            </li>

                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
