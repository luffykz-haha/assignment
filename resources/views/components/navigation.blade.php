<nav class="nav-bar">
    <div class="nav-container">
            <a href="{{ route('welcome') }}" class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}">
                Home
            </a>
            <a href="{{ route('explore') }}" class="nav-link {{ request()->routeIs('explore') ? 'active' : '' }}">
                Explore
            </a>
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}">
                Bookings
            </a>
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                Profile
            </a>
    </div>
</nav>

<style>
    .nav-bar {
        background-color: white;;
        padding: 0 30px;
    }

    .nav-container {
        display: flex;
        gap: 0;
        max-width: 1200px;
        margin: 0 auto;
    }

    .nav-link {
        color: #1f2937;
        text-decoration: none;
        padding: 12px 20px;
        display: block;
        font-weight: 500;
        transition: all 0.3s ease;
        border-bottom: 3px solid transparent;
        border-radius: 30px;
        margin: 5px 5px;
    }

    .nav-link:hover {
        background-color: #e8f0ff;
        color: #2a5593;
    }

    .nav-link.active {
        color: #2a5593;
        font-weight: bold;
        border: 1px solid #2a5593;
    }
</style>