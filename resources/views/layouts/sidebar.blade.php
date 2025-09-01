<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger"><a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a><a href="#"
                class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a></div>
        <div class="nk-sidebar-brand"><a href="{{ route('dashboard') }}" class="logo-link nk-sidebar-logo">{{ config('app.name', 'Village MIS') }}</a></div>
    </div>
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Use-Case Preview</h6>
                    </li>
                    <li class="nk-menu-item"><a href="{{ route('dashboard') }}" class="nk-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><span
                                class="nk-menu-text">Dashboard</span></a></li>
                    <li class="nk-menu-item"><a href="{{ route('users.index') }}" class="nk-menu-link {{ request()->routeIs('users.index') ? 'active' : '' }}"><span
                                class="nk-menu-text">User Management</span></a></li>

                    <li class="nk-menu-item"><a href="{{ route('birth_records.index') }}" class="nk-menu-link {{ request()->routeIs('birth_records.index') ? 'active' : '' }}"><span
                                class="nk-menu-text">Birth Records</span></a></li>
                    <li class="nk-menu-item"><a href="{{ route('birth.reports.index') }}" class="nk-menu-link {{ request()->routeIs('birth.reports.index') ? 'active' : '' }}"><span
                                class="nk-menu-text">Birth Reports</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a class="nk-menu-link {{ request()->routeIs('death_records.index') ? 'active' : '' }}" href="{{ route('death_records.index') }}">Death Records</a>
                    </li>
                    <li class="nk-menu-item">
                        <a class="nk-menu-link {{ request()->routeIs('death.reports.index') ? 'active' : '' }}" href="{{ route('death.reports.index') }}">Death Reports</a>
                    </li>
                    <li class="nk-menu-item">
                        <a class="nk-menu-link {{ request()->routeIs('populations.index') ? 'active' : '' }}" href="{{ route('populations.index') }}">Population Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>