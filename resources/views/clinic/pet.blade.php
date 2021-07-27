@extends('clinic/layouts/body',[
'title' => $pet->name . "'s " . "Page",
'current_menu_item' => 'pet-page'
])

@section('content')
<div class="pet-detail-page">
     <h2 class="pet-detail-name">{{$pet ->name}}</h2>
          <div class="pet-data">
               <ul class="pet-details">
                    <li>Years: {{$pet->age}}</li>
                    <li>Breed: {{$pet->breed}}</li>
                    <li>Weight: {{$pet->weight}}</li>
               </ul>
               <img class="pet-image" style="width:200px;height:auto;" src="/pets/{{$pet->photo}}" alt="">
          </div>
          
          
               
<a class="link-section" href="{{route('client',$client->id)}}">Owner's Page</a>
</div>
@endsection