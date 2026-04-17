<header class="main-header">
    <nav class="nav-bar">

        <!-- Logo -->
        <!-- <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        </div> -->

        <!-- Navigation -->
        <div class="nav-links">
            @guest
                <a href="{{ route('login') }}" class="login-button">Login</a>
                <a href="{{ route('register') }}" class="signup-button">Sign Up</a>
            @endguest

            @auth
                <span class="welcome-text">Welcome, {{ Auth::user()->name }}!</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            @endauth
        </div>

    </nav>
</header>

<!-- Styling -->
<style>
    body{
        margin: 0;
    }

    .main-header {
        background-color: #9ccfff;
        padding: 15px 30px; 
        height: 50px;
    }

    .nav-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* .logo-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo {
        height: 50px;
        width: auto;
        object-fit: contain;
    } */

    .login-button {
        padding: 8px 16px;
        background-color: #ffffff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .signup-button {
        padding: 8px 16px;
        background-color: #22c55e;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .signup-button:hover {
        background-color: #16a34a;
    }

    .welcome-text {
        color: white;
        font-weight: bold;
    }

    .logout-button {
        background-color: transparent;
        color: white;
        border: none;
        cursor: pointer;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
    }

    .logout-button:hover {
        background-color: #ef4444;
        color: white;
    }
</style>