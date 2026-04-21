@extends('layouts.app')

@section('content')

@php
    $sportEmojis = [
        'badminton'    => '🏸',
        'tennis'       => '🎾',
        'basketball'   => '🏀',
        'football'     => '⚽',
        'soccer'       => '⚽',
        'volleyball'   => '🏐',
        'squash'       => '🎯',
        'ping pong'    => '🏓',
        'table tennis' => '🏓',
        'swimming'     => '🏊',
        'cricket'      => '🏏',
        'hockey'       => '🏒',
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
            <div class="court-card">
                <div class="court-card-content">
                    <h3>{{ $court->name }}</h3>
                    <p class="court-location">📍 {{ $court->location }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection

<style>
    .results-header {
        margin-bottom: 30px;
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
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 10px;
    }

    .court-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .court-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }

    .court-card-content {
        padding: 20px;
    }

    .court-card h3 {
        margin: 0 0 10px 0;
        font-size: 18px;
        color: #1e293b;
    }

    .court-location {
        margin: 0;
        color: #64748b;
        font-size: 14px;
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
