<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-4">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            {{ config('app.name', 'Village MIS') }}
        </a>

        <!-- Toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Left-side links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('birth_records.index') ? 'active' : '' }}" href="{{ route('birth_records.index') }}">Birth Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('birth.reports.index') ? 'active' : '' }}" href="{{ route('birth.reports.index') }}">Birth Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('death_records.index') ? 'active' : '' }}" href="{{ route('death_records.index') }}">Death Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('death.reports.index') ? 'active' : '' }}" href="{{ route('death.reports.index') }}">Death Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('populations.index') ? 'active' : '' }}" href="{{ route('populations.index') }}">Population Data</a>
                </li>
            </ul>

            <!-- Right-side icons -->
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a id="notificationsDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        🔔
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <span class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown" style="width: 300px;">
                        <h6 class="dropdown-header">Notifications</h6>
                        @forelse(auth()->user()->unreadNotifications as $notification)
                            <a href="#" class="dropdown-item">
                                {{ $notification->data['message'] ?? 'New Notification' }}
                                <br>
                                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                            </a>
                        @empty
                            <span class="dropdown-item text-muted">No new notifications</span>
                        @endforelse

                        <div class="dropdown-divider"></div>
                        <a href="{{ route('notifications.markAllAsRead') }}" class="dropdown-item text-center text-primary">Mark all as read</a>
                    </div>
                </li>

                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
