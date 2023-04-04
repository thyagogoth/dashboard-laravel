{{-- for mobile purposes --}}
<div class="app-header__logo">
    <div class="logo-src"></div>
    <div class="header__pane ml-auto">
        <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
</div>
<div class="app-header__mobile-menu">
    <div>
        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
</div>
<div class="app-header__menu">
    <span>
        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
        </button>
    </span>
</div>

<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">

            <li class="app-sidebar__heading">
                Menu
            </li>


            <li class="">
                <a href="#1" aria-expanded="false">
                    <i class="metismenu-icon pe-7s-rocket"></i> {{ "Modulo"}}
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul class="mm-collapse" style="">

                    @foreach ($menus as $menu)
                    <li>
                        <a href="{{ route($menu->resource) }}">
                            <i class="metismenu-icon"></i>{{ $menu->name }}
                        </a>
                    </li>
                    @endforeach

                </ul>
            </li>

        </ul>
    </div>
</div>
