@extends('layouts.app')

@section('content')

<h2>Explore Courts</h2>

<form method="GET" action="{{ route('explore') }}" style="margin-bottom: 30px;">
    <input type="text" name="search" placeholder="Search courts or locations"
        style="padding: 10px; width: 60%">
    <button type="submit" style="padding: 10px;">Search</button>
</form>

<!-- Sports Selection -->
<div style="margin-bottom: 30px;">
    <h3 style="margin-bottom: 15px;">Select a Sport</h3>
    <div class="sports-grid">
        <div class="sport-card" onclick="showAllCourts()" style="cursor: pointer;">
            <div class="sport-card-content">
                <span class="sport-name">All Courts</span>
            </div>
        </div>

        @foreach($sports as $sport)
            <div class="sport-card" onclick="selectSport({{ $sport->id }}, '{{ $sport->name }}')" style="cursor: pointer;">
                <div class="sport-card-content">
                    <span class="sport-name">{{ $sport->name }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Courts Display -->
<div id="courts-container" style="display: none;">
    <div id="selected-sport-info" style="margin-bottom: 20px;">
        <p>Showing courts for: <strong id="sport-name"></strong></p>
    </div>

    <div class="courts-grid">
        @foreach($courts as $court)
            <div class="court-card" data-sport-id="{{ $court->sport_id }}">
                <div class="court-card-content">
                    <h3>{{ $court->name }}</h3>
                    <p class="court-location">📍 {{ $court->location }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- No Courts Message -->
<div id="no-courts-message" style="display: none; text-align: center; padding: 40px; color: #666;">
    <p>No courts found for this sport.</p>
</div>

@endsection

<style>
    .sports-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
        margin-top: 15px;
    }

    .sport-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .sport-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    }

    .sport-card.active {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        box-shadow: 0 4px 16px rgba(245, 87, 108, 0.3);
    }

    .sport-card-content {
        color: white;
    }

    .sport-name {
        font-size: 16px;
        font-weight: 600;
    }

    .courts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .court-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .court-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
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

    .hidden {
        display: none !important;
    }
</style>

<script>
    let selectedSportId = null;
    const courtsByBrand = {};

    // Group courts by sport ID
    @foreach($courts as $court)
        if (!courtsByBrand[{{ $court->sport_id }}]) {
            courtsByBrand[{{ $court->sport_id }}] = [];
        }
        courtsByBrand[{{ $court->sport_id }}].push({{ $court->id }});
    @endforeach

    function selectSport(sportId, sportName) {
        selectedSportId = sportId;
        updateUI(sportId, sportName);
    }

    function showAllCourts() {
        selectedSportId = null;
        updateUI(null, 'All Courts');
    }

    function updateUI(sportId, sportName) {
        // Update active card styling
        document.querySelectorAll('.sport-card').forEach(card => {
            card.classList.remove('active');
        });

        const currentCard = event.currentTarget;
        if (currentCard) {
            currentCard.classList.add('active');
        }

        // Show/hide courts
        const courtsContainer = document.getElementById('courts-container');
        const noMessage = document.getElementById('no-courts-message');
        
        if (sportId === null) {
            // Show all courts
            document.querySelectorAll('.court-card').forEach(card => {
                card.classList.remove('hidden');
            });
        } else {
            // Show only courts for selected sport
            const visibleCourts = courtsByBrand[sportId] || [];
            document.querySelectorAll('.court-card').forEach(card => {
                const courtId = parseInt(card.getAttribute('data-sport-id'));
                if (visibleCourts.includes(courtId)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        // Update sport name display
        document.getElementById('sport-name').textContent = sportName;
        courtsContainer.style.display = 'block';
        noMessage.style.display = 'none';
    }
</script>