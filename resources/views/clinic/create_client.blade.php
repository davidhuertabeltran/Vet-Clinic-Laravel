@extends('clinic/layouts/body',[
'title' => 'Create client',
'current_menu_item' => 'create-client'
])



@section('content')

    <h1 class="add_new_client">Add a new client</h1>

    {{-- FORM TO CREATE NEW CLIENT --}}

    <form class="form create_new_client" action="{{route('client-store')}}" method="post">
        @csrf


        {{-- ADD NEW CLIENT'S NAME --}}

        @component('clinic.components.form-group',[
            'label' => 'First Name',
            'name' => 'first_name'
        ])

        <input class="form__field" type="text" name="first_name" value="{{old('first_name',$client->first_name)}}">

        @endcomponent


        {{-- ADD NEW CLIENT'S SURNAME --}}

        @component('clinic.components.form-group',[
            'label' => 'Surname',
            'name' => 'surname'
        ])

        <input  class="form__field" type="text" name="surname" value="{{old('surname',$client->surname)}}">

        @endcomponent

        <input  class="btn btn--primary uppercase" type="submit" value="Confirm">

    </form>

@endsection
