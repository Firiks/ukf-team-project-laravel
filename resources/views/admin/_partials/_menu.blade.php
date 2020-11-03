<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Webstránka</li>
                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span>Úvod</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-message"></i>
                        <span>Udalosti<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('event_categories.index') }}">
                                Kategórie Udalostí
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('events.index') }}">
                                Udalosti
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-message"></i>
                        <span>Pracoviská<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('workplaces.index') }}">
                                Pracoviská
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-file"></i>
                        <span>Súbory<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('files.index') }}">
                                Zoznam súborov
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
