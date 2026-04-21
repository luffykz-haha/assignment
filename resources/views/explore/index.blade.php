@extends('layouts.app')

@section('content')

<h2>Explore Courts</h2>

<p style="color: #64748b; margin-bottom: 30px;">Choose a sport to find available courts near you.</p>

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

@endsection

<style>
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        padding: 20px 10px;
        text-align: center;
        text-decoration: none;
        color: white;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
    }

    .sport-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.45);
        color: white;
        text-decoration: none;
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
</style>