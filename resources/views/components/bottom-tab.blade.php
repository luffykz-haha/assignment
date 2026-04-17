<div class = "bottom-tab">
    <a href= "{{ route('home') }}" class="tab-link">🏠<br>Home</a>
    <a href="{{ route('explore') }}" class="tab-link">🔍<br>Explore</a>
    
</div>

<style>
    .bottom-tab {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #9ccfff;
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
    }

    .tab-link {
        color: #333;
        text-decoration: none;
        font-size: 16px;
    }

    .tab-link:hover {
        color: #555;
    }
</style>