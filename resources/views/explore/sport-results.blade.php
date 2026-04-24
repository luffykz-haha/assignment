@extends('layouts.app')

@section('content')

@php
    $sportEmojis = [
        'badminton'    => '🏸',
        'tennis'       => '🎾',
        'basketball'   => '🏀',
        'volleyball'   => '🏐',
        'pickleball'    => '🏟️',
    ];
    $emoji = $sportEmojis[strtolower($sport->name)] ?? '🏟️';
@endphp

<div class="results-header">
    <a href="{{ route('explore') }}" class="back-btn">← Back to Sports</a>
    <h2 class="sport-title">{{ $emoji }} {{ $sport->name }}</h2>
    <p class="sport-subtitle">
        {{ $courts->count() }} court{{ $courts->count() !== 1 ? 's' : '' }} available
    </p>
</div>

@if($courts->isEmpty())
    <div class="empty-state">
        <span class="empty-icon">🔍</span>
        <p>No courts found for {{ $sport->name }}.</p>
    </div>
@else
    <div class="courts-grid">
        @foreach($courts as $court)
            @php
                $detailsUrl = route('explore.sport', $sport->id);
                $bookNowUrl = auth()->check() ? $detailsUrl : route('login');
            @endphp
            <div class="court-card">
                <a href="{{ route('explore') }}" class="card-link-overlay" aria-label="Open {{ $court->name }}"></a>
                <div class="court-card-header">
                    <h3>{{ $court->name }}</h3>
                    <span class="sport-badge">
                        {{ $emoji }} {{ $sport->name }}
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
        @endforeach
    </div>
@endif

@endsection

<style>
    .results-header {
        margin-bottom: 30px;
        padding: 0 30px;
        max-width: 1200px;
    }

    .back-btn {
        display: inline-block;
        margin-bottom: 16px;
        padding: 8px 16px;
        background: #f1f5f9;
        color: #475569;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: background 0.2s ease;
    }

    .back-btn:hover {
        background: #e2e8f0;
        color: #1e293b;
        text-decoration: none;
    }

    .sport-title {
        font-size: 32px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 6px 0;
    }

    .sport-subtitle {
        color: #64748b;
        margin: 0;
        font-size: 15px;
    }

    .courts-grid {
        padding: 0 30px;
        max-width: 1200px;
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

    .court-card h3 {
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

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #64748b;
    }

    .empty-icon {
        font-size: 48px;
        display: block;
        margin-bottom: 16px;
    }
</style>
