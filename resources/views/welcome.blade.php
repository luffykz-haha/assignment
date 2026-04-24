@extends('layouts.app')

@section('content')
<div class="hero-banner" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/banner.jpg') }}');">
    <div class="hero-overlay">
        <h1>Get Active & Play Sports Together</h1>
        <p>Discover nearby courts and reserve a slot now!</p>

        <a href="{{ route('explore') }}" class="hero-btn">
            Explore Now
        </a>
    </div>
</div>

<!-- Featured Courts Section -->
<section class="featured-courts-section">
    <div class="featured-courts-container">
        <h2>Featured Courts</h2>
        <p class="featured-subtitle">Check out some of our popular courts and book a slot today!</p>
        
        <div class="courts-grid">
            @forelse($featuredCourts as $court)
                @php
                    $detailsUrl = !empty($court->sport_id)
                        ? route('explore.sport', $court->sport_id)
                        : route('explore');
                    $bookNowUrl = auth()->check() ? $detailsUrl : route('login');
                @endphp
                <div class="court-card">
                    <a href="{{ route('explore') }}" class="card-link-overlay" aria-label="Open {{ $court->name }}"></a>
                    <div class="court-card-header">
                        <h3>{{ $court->name }}</h3>
                        <span class="sport-badge">
                            @switch($court->sport->name ?? '')
                                @case('Basketball')
                                    🏀
                                    @break
                                @case('Soccer')
                                    ⚽
                                    @break
                                @case('Tennis')
                                    🎾
                                    @break
                                @case('Badminton')
                                    🏸
                                    @break
                                @default
                                    🏟️
                            @endswitch
                            {{ $court->sport->name ?? 'Sport' }}
                        </span>
                    </div>
                    <div class="court-card-body">
                        <p class="location">📍 {{ $court->location }}</p>
                    </div>
                    <div class="court-card-footer">
                        <a href="{{ route('explore') }}" class="view-btn">View Details</a>
                        <a href="{{ route('explore') }}" class="book-btn">Book Now</a>
                    </div>
                </div>
            @empty
                <p class="no-courts" style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #94a3b8;">
                    No courts available at the moment.
                </p>
            @endforelse
        </div>

        <div class="featured-footer">
            <a href="{{ route('explore') }}" class="explore-all-btn">Explore All Courts</a>
        </div>
    </div>
</section>

@endsection

<style>
    .hero-banner {
        background-repeat: no-repeat;
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

    .featured-courts-section {
        padding: 60px 30px;
        background: white;
    }

    .featured-courts-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .featured-courts-section h2 {
        font-size: 36px;
        color: #1e293b;
        margin: 0 0 10px 0;
        text-align: center;
    }

    .featured-subtitle {
        text-align: center;
        color: #64748b;
        font-size: 16px;
        margin: 0 0 40px 0;
    }

    .courts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .court-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        position: relative;
        cursor: pointer;
        border: 1px solid #d9dedb;
    }

    .card-link-overlay {
        position: absolute;
        inset: 0;
        z-index: 1;
    }

    .court-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .court-card-header {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
        position: relative;
        z-index: 2;
    }

    .court-card-header h3 {
        margin: 0;
        font-size: 18px;
        color: #1e293b;
        flex: 1;
    }

    .sport-badge {
        background-color: #f0f4ff;
        color: #2a5593;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
    }

    .court-card-body {
        padding: 16px 20px;
        flex: 1;
        position: relative;
        z-index: 2;
    }

    .location {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .court-card-footer {
        padding: 16px 20px;
        border-top: 1px solid #e2e8f0;
        text-align: center;
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: center;
        gap: 12px;
    }

    .view-btn {
        color: #2a5593;
        background-color: white;
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
        border: 1px solid #2a5593;
    }

    .view-btn:hover {
        color: #1d4ed8;
        background-color: #dbeafe;
        text-decoration: none;
    }

    .book-btn {
        background-color: #2a5593;
        color: white;
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .book-btn:hover {
        background-color: #1d4ed8;
    }

    .featured-footer {
        text-align: center;
    }

    .explore-all-btn {
        display: inline-block;
        background-color: #2a5593;
        color: white;
        padding: 12px 32px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .explore-all-btn:hover {
        background-color: #1d4ed8;
    }

</style>