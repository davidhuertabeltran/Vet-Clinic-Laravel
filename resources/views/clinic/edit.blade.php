@extends('clinic/layouts/body',[
'title' => 'Edit : ' . $client->first_name,
'current_menu_item' => 'pet-page'
])


@section('content')

<h1 class="edit-client">Edit Client: {{$client->first_name}}</h1>

@if (Session::has('success_message'))

    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>

@endif

{{-- FORMS --}}


<form action="{{route('client-update',[$client->id])}}" method="post">
@csrf
@method('put')

{{-- UPDATE FIRST NAME --}}

@component('clinic.components.form-group',[
    'label' => 'First Name',
    'name' => 'first_name'
])

 <input class="form__field" type="text" name="first_name" value="{{old('first_name',$client->first_name)}}">

@endcomponent


{{-- UPDATE SURNAME --}}


@component('clinic.components.form-group',[
    'label' => 'Surname',
    'name' => 'surname'
])

<input class="form__field" type="text" name="surname" value="{{old('surname',$client->surname)}}">

@endcomponent

<br>


<input class="btn btn--primary" type="submit" value="Update">


</form>




{{-- ADDING PET SECTION FOR EDIT --}}


{{-- PROVIDING THE FOLLOWING PAGE WITH ALL $CLIENT --}}

@include('clinic.pet-section')






@endsection


