<header class="main-header">
    <nav class="nav-bar">

        <!-- Logo -->
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        </div>

        <!-- Navigation -->
        <div class="nav-links">
            @guest
                <a href="{{ route('register') }}" class="signup-button">Sign Up</a>
                <a href="{{ route('login') }}" class="login-button">Login</a>
            @endguest

            @auth
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
        background-color: #ffffff;
        padding: 15px 30px; 
        height: 70px;
    }

    .nav-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo {
        height: 70px;
        width: auto;
        object-fit: contain;
    }

    .signup-button {
        padding: 8px 16px;
        background-color: #ffffff;
        color: #0b052b;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        margin-right: 10px;
    }

    .signup-button:hover {
        background-color: #e1e5fc;
    }

    .login-button {
        padding: 8px 16px;
        background-color: #2a5593;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .logout-button {
        background-color: transparent;
        color: #0b052b;
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