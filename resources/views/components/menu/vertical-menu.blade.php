{{--

/**
*
* Created a new component <x-menu.vertical-menu/>.
* 
*/

--}}


<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{getRouterValue();}}/dashboard/analytics">
                        <img src="{{Vite::asset('resources/images/new_logo.svg')}}" class="navbar-logo logo-dark" alt="logo">
                        <img src="{{Vite::asset('resources/images/new_logo.svg')}}" class="navbar-logo logo-light" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="{{getRouterValue();}}/dashboard/analytics" class="nav-link"> CRM </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        @if (!Request::is('collapsible-menu/*'))
        <div class="profile-info">
            <div class="user-info">
                <div class="profile-img">
                    <img src="{{Vite::asset('resources/images/shamas_pic.jpg')}}" alt="avatar">
                </div>
                <div class="profile-content">
                    <h6 class="">Shamas Rehman</h6>
                    <p class="">Project Developer</p>
                </div>
            </div>
        </div>
        @endif
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ Request::is('*/dashboard/*') ? "active" : "" }}">
                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="{{ Request::is('*/dashboard/*') ? "true" : "false" }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('*/dashboard/*') ? "show" : "" }}" id="dashboard" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('analytics') ? 'active' : '' }}">
                        <a href="{{getRouterValue();}}/light-menu/dashboard/analytics"> Analytics </a>
                    </li>
                    <li class="{{ Request::routeIs('sales') ? 'active' : '' }}">
                        <a href="{{getRouterValue();}}/light-menu/dashboard/sales"> Sales </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span>APPLICATIONS</span></div>
            </li>

            <li class="menu {{ request()->path() == 'light-menu/app/product-defects' ? 'active' : '' }}">
                <a href="{{getRouterValue();}}/light-menu/app/product-defects" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3l-8.47-14.14a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12" y2="17"></line>
                        </svg>
                        <span>Product Defects</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ request()->path() == 'light-menu/app/feedbacks' ? 'active' : '' }}">
                <a href="{{getRouterValue();}}/light-menu/app/feedbacks" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2zm-4-0" />
                            <polyline points="16 9 7 9" transform="translate(0 -0.25)" />
                            <polyline points="16 13 7 13" />
                        </svg>
                        <span>Feedbacks</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ Request::routeIs('resolutions') ? 'active' : '' }}">
                <a href="{{getRouterValue();}}/light-menu/app/resolutions" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                            <path d="M22 11.08V12a10 10 0 1 1-5-9.31"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>Resolutions</span>
                    </div>
                </a>
            </li>
        </ul>

    </nav>

</div>