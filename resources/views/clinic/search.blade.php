@extends('clinic/layouts/body',[
'title' => 'Search Results',
'current_menu_item' => 'search'
])

@section('content')

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