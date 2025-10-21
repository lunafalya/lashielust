<!-- HEADER -->
<header class="navbar">
  <div class="logo">
    <img src="{{ asset('images/logo.png') }}" alt="Lashie Lust Logo">
  </div>
  <nav>
    <ul>
      <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
      <li><a href="{{ url('/aboutus') }}" class="{{ request()->is('aboutus') ? 'active' : '' }}">About Us</a></li>
      <li><a href="{{ url('/services') }}" class="{{ request()->is('services') ? 'active' : '' }}">Services</a></li>
      <li><a href="{{ url('/contactus') }}" class="{{ request()->is('contactus') ? 'active' : '' }}">Contact Us</a></li>
    </ul>
  </nav>
  <div class="nav-icons">
    <!-- <img src="{{ asset('images/searchlogo.png') }}" alt="searchlogo" class="search-icon"> -->

    <div class="dropdown">
      <img src="{{ asset('images/profilelogo.png') }}" alt="profilelogo" class="profile-icon" id="profileBtn" >

      <div class="dropdown-content" id="dropdownMenu">
        <a href="{{ url('/login')}}">Login</a>
        <a href="{{ url('/profile') }}">Profile</a>
        <a>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
                Log Out
            </button>
        </form>
        </a>
      </div>
</header>