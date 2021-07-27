<div class="top-container">
    <nav class="top-menu">
        <a href="{{route('home')}}" @if ($current == 'home') class="current" @endif>HOME</a>
        <a href="{{route('database-api')}}"@if ($current == 'api') class="current" @endif>API</a>
        <a href="{{route('about_us')}}"@if ($current == 'about_us') class="current" @endif>ABOUT</a>
        <a href="{{route('client-create')}}"@if ($current == 'create-client') class="current" @endif>ADMIN</a>

    </nav>
    
</div>
