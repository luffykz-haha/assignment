@extends('layouts.app')

@section('content')

<section class="explore-hero">
    <div class="explore-hero-banner" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/explore.jpg') }}');">
        <div class="explore-hero-overlay">
            <h1>Explore</h1>
            <p>Search courts by location or sport</p>

            <form method="GET" action="{{ route('explore') }}" class="explore-search-form">
                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Enter location or sport type"
                    class="explore-search-input"
                    aria-label="Search by location or sport"
                >
                <button type="submit" class="explore-search-btn">Search</button>
            </form>
        </div>
    </div>
</section>

<div class="explore-content">
    @if(!empty($search))
        <section class="search-results-section">
            <div class="search-results-container">
                <h2>Search Results</h2>
                <p class="search-subtitle">
                    Showing courts matching "{{ $search }}"
                </p>

                @if($matchingCourts->isEmpty())
                    <p class="no-results">No courts found. Try another sport or location.</p>
                @else
                    <div class="courts-grid">
                        @foreach($matchingCourts as $court)
                            @php
                                $detailsUrl = !empty($court->sport_id)
                                    ? route('explore.sport', $court->sport_id)
                                    : route('explore');
                                $bookNowUrl = auth()->check() ? $detailsUrl : route('login');
                            @endphp
                            <div class="court-card">
                                <a href="{{ $detailsUrl }}" class="card-link-overlay" aria-label="Open {{ $court->name }}"></a>
                                <div class="court-card-header">
                                    <h3>{{ $court->name }}</h3>
                                    <span class="sport-badge">
                                        {{ $court->sport->name ?? 'Sport' }}
                                    </span>
                                </div>
                                <div class="court-card-body">
                                    <p class="location">📍 {{ $court->location }}</p>
                                </div>
                                <div class="court-card-footer">
                                    <a href="{{ $detailsUrl }}" class="view-btn">View Details</a>
                                    <a href="{{ $bookNowUrl }}" class="book-btn">Book Now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    <h2 class="sports-title">Search by Sport Category</h2>

    <div class="sports-grid">
        @php
            $sportEmojis = [
                'badminton'  => '🏸',
                'tennis'     => '🎾',
                'basketball' => '🏀',
                'football'   => '⚽',
                'soccer'     => '⚽',
                'volleyball' => '🏐',
                'squash'     => '🎯',
                'ping pong'  => '🏓',
                'table tennis' => '🏓',
                'swimming'   => '🏊',
                'cricket'    => '🏏',
                'hockey'     => '🏒',
            ];
        @endphp

        @foreach($sports as $sport)
            @php
                $emoji = $sportEmojis[strtolower($sport->name)] ?? '🏟️';
            @endphp
            <a href="{{ route('explore.sport', $sport->id) }}" class="sport-card">
                <span class="sport-emoji">{{ $emoji }}</span>
                <span class="sport-name">{{ $sport->name }}</span>
            </a>
        @endforeach
    </div>
</div>

@endsection

<style>
    .explore-hero-banner {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 280px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
    }

    .explore-hero-overlay {
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        color: white;
    }

    .explore-hero-overlay h1 {
        margin: 0 0 8px 0;
        font-size: 38px;
        font-weight: 700;
    }

    .explore-hero-overlay p {
        margin: 0 0 18px 0;
        font-size: 16px;
        opacity: 0.96;
    }

    .explore-search-form {
        display: flex;
        gap: 10px;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 920px;
        margin: 0 auto;
    }

    .explore-search-input {
        flex: 1;
        min-width: 0;
        border: none;
        border-radius: 10px;
        padding: 12px 14px;
        font-size: 15px;
        outline: none;
    }

    .explore-search-btn {
        border: none;
        border-radius: 10px;
        background: #2a5593;
        color: white;
        padding: 12px 18px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .explore-search-btn:hover {
        background: #1e293b;
    }

    .explore-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 30px;
    }

    .search-results-section {
        margin-bottom: 28px;
    }

    .search-results-container h2 {
        font-size: 30px;
        color: #1e293b;
        margin: 0 0 8px 0;
    }

    .search-subtitle {
        color: #64748b;
        margin: 0 0 24px 0;
    }

    .no-results {
        color: #64748b;
        margin: 0 0 24px 0;
    }

    .sports-title {
        margin-top: 0;
    }

    .sports-subtitle {
        color: #64748b;
        margin-bottom: 30px;
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

    .sports-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 16px;
        margin-top: 10px;
    }

    .sport-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        aspect-ratio: 1 / 1;
        background: white;
        border: 1px solid #2a5593;
        border-radius: 12px;
        padding: 20px 10px;
        text-align: center;
        text-decoration: none;
        color: #2a5593;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
    }

    .sport-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.45);
        text-decoration: none;
        background-color: #e8ecfc;
    }

    .sport-emoji {
        font-size: 40px;
        margin-bottom: 10px;
        line-height: 1;
    }

    .sport-name {
        font-size: 15px;
        font-weight: 600;
        line-height: 1.2;
    }

    @media (max-width: 640px) {
        .explore-hero {
            height: auto;
        }

        .explore-search-form {
            flex-direction: column;
        }

        .explore-search-input,
        .explore-search-btn {
            width: 100%;
        }
    }
</style>