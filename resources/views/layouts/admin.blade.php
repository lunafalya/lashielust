@php
    $user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="icon" href="img/core-img/logo.png">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body class="d-flex"> 

    <div class="sidebar-container">
        <div class="brand-info text-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Lashie Lust Logo">
            <p class="h5 mt-2">Lashie Lust</p>
        </div>
        <div class="sidebar-scroll-area">
            <div class="navigation-menu mb-2">
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.dashboard.*') ? 'active' : '' }}">
                            <i class="fas fa-th-large me-3"></i> 
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.notifications') }}" 
                        class="nav-link {{ request()->routeIs('admin.notifications') || request()->routeIs('admin.notifications.*') ? 'active' : '' }}">
                            <i class="fas fa-bell me-3"></i> 
                            Notifications
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.messages') }}" 
                        class="nav-link {{ request()->routeIs('admin.messages') || request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                            <i class="fas fa-bell me-3"></i> 
                            Message
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.services') }}" 
                        class="nav-link {{ request()->routeIs('admin.services') || request()->routeIs('admin.services.*') ? 'active' : '' }}">
                            <i class="fas fa-concierge-bell me-3"></i> Services
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.bookings') }}"
                        class="nav-link {{ request()->routeIs('admin.bookings') || request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                            <i class="fas fa-shopping-cart me-3"></i> Booking
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.reviews') }}" 
                        class="nav-link {{ request()->routeIs('admin.reviews') || request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                            <i class="fas fa-comment-dots me-3"></i> Review
                        </a>
                    </li>
                </ul>
            </div>
            <hr>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-logout text-center" style="pointer-events: auto;">
                Log Out
                </button>
                </form>
        </div>
    </div>
    <div class="main-content"> 
        
        <div class="header-container d-flex justify-content-between align-items-center">
            
            <div class="search-box">
                <i class="fas fa-search me-3"></i> 
                <input type="text" placeholder="Search" class="form-control">
            </div>

            <div class="user-info d-flex align-items-center">
                <form action="{{ route('admin.notifications') }}">
                @csrf
                <button type="submit" class="btn me-3" style="pointer-events: auto;">
                <i class="fas fa-bell"> </i>
                </button>
                </form>

                <div class="dropdown">
                    <a href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex align-items-center text-decoration-none text-dark">
                     @if($user && $user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" width="80" height="80" style="border-radius:50%;object-fit:cover;">
                    @else
                    @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
    
                        <li class="dropdown-header d-flex align-items-center mb-2">
                        @if($user && $user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" width="80" height="80" style="border-radius:50%;object-fit:cover;" class="dropdown-avatar me-2">
                        @else
                        @endif  
                            <div>
                                <span class="fw-medium d-block">{{ $user->name }}</span>
                                <small class="text-muted">{{ ucfirst($user->role) }}</small>
                            </div>
                        </li>
                        
                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}">
                                <i class="fas fa-user me-3 dropdown-icon-lg"></i> 
                                My Profile
                            </a>
                        </li>
                        
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item d-flex align-items-center">
                                @csrf
                                <i class="fas fa-user me-3 dropdown-icon-lg"></i>
                                <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
                                Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <form id="logout-form-header" action="#" method="POST" style="display: none;">
            @csrf
        </form>

        <main class="py-4 flex-grow-1">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>
</html>