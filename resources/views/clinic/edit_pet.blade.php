@extends('clinic/layouts/body',[
'title' => 'Edit : ' . $pet->name,
'current_menu_item' => 'pet-page'
])

@section('content')
 @if (Session::has('success_message'))

    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>

 @endif

<h2 class="edit-pet">Editing {{$pet->name}}</h2>



<form action="{{route('pet-update',[$pet->id])}}" method="post">
@csrf
@method('put')

{{-- EDIT PET NAME --}}


@component('clinic.components.form-group',[
    'label' => 'Pet Name',
    'name' => 'name'
])
<input type="text" name="name" value="{{old('name',$pet->name)}}">

@endcomponent


{{-- EDIT BREED --}}


@component('clinic.components.form-group',[
    'label' => 'Breed',
    'name' => 'breed'
])
<input type="text" name="breed" value="{{old('breed',$pet->breed)}}">

@endcomponent



{{-- EDIT AGE --}}


@component('clinic.components.form-group',[
    'label' => 'Age',
    'name' => 'age'
])
<input type="number" name="age" value="{{old('age',$pet->age)}}">

@endcomponent



{{-- EDIT WEIGHT IN KG --}}


@component('clinic.components.form-group',[
    'label' => 'Weight(kg)',
    'name' => 'weight'
])
<input type="number" name="weight" value="{{old('weight',$pet->weight)}}">

@endcomponent



<input type="submit" value="save" class="button">

</form>

@endsection