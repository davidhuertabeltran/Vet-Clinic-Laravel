@extends('clinic/layouts/body',[
'title' => 'Search Results',
'current_menu_item' => 'search'
])

@section('content')

{{-- SEARCH FUNCTIONALITY IN ALL OUR PAGES --}}
   <div class="search__container">
        <form action="{{ route('search') }}" method="GET">
        @csrf

        <input type="text" class="search__input" name="search"  placeholder="Search" required />

        <button class="search__submit--button" type="submit">Search</button>

       </form>
   </div>

<h1 class="search-results"> Search Results</h1>


@if($clients->isNotEmpty())

@foreach ($clients as $client)

<ol class="owner-list">
    <li><a href="{{action('clientController@show',[$client->id])}}" class="owner-link">
        <div class="search_result">{{ $client->first_name }} {{ $client->surname }}</div>
    </a></li>
</ol>

@endforeach

@else
<div class='no-results'>
    <h2>No clients found </h2>
</div>
@endif


@endsection