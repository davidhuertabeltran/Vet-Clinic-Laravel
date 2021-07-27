@extends('clinic/layouts/body',[
'title' => 'Client Profile',
'current_menu_item' => 'client'
])

@section('content')
    <h2>{{$client->first_name}} {{$client->surname}}</h2>

    <p class="edit-owner"><a href="{{route('client-edit',[$client->id])}}">Edit Owner</a></p>
    <div class="pet-results">

    
         @foreach($client->pets as $pet)
          <div class="pet-results-list">
            <p class="pet-name"><a href="{{route('pet',[$client->id, $pet->id])}}">{{$pet->name}}</a></p>
            <a href="{{route('pet',[$client->id, $pet->id])}}"><img class="pet-image" style="width:200px;height:auto;" src="/pets/{{$pet->photo}}" alt="pet photo"></a>
           </div>
         @endforeach

      </div>
    
<a class="link-section" href="{{route('home')}}">Back to results</a>

@endsection
