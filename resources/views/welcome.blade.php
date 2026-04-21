@extends('layouts.app')

@section('content')

<div class="hero-banner">
    <div class="hero-overlay">
        <h1>Get Active & Play Sports Together</h1>
        <p>Discover nearby courts and reserve a slot now!</p>

        <a href="{{ route('explore') }}" class="hero-btn">
            Explore Now
        </a>
    </div>
</div>

@endsection

<style>
     .hero-banner {
        background: 
            linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
            url('/images/banner.jpg');
        background-size: cover;
        background-position: center;
        height: 370px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-overlay {
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        color: white;
    }

    .hero-overlay h1 {
        font-size: 50px;
        margin-bottom: 10px;
    }

    .hero-overlay p {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .hero-btn {
        background-color: #2a5593;
        color: white;
        padding: 10px 20px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        font-size: 20px;
    }

    .hero-btn:hover {
        background-color: #1d4ed8;
    }
</style>