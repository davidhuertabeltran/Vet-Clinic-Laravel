<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Pet;


class PetController extends Controller
{

    //CREATE A NEW OBJECT/DATA IN OUR DATABASE
    public function create()
    {
        $pet = new Pet;

        return view('clinic.create_pet')
            ->with('pet', $pet);
    }


    // HANDLE DATA AFTER SUBMISSION

    public function storePet(Request $request)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'first_name' => 'required',
        //         'surname' => 'required'
        //     ],
        //     [

        //         'first_name.required' => 'Just give us the name, man!',
        //         'surname.required' => 'Just give ur surname !',

        //     ]

        // );

        //Prepare empty object
        $pet = new Pet;

        //fill object with request data
        $pet->name = $request->input('name');
        $pet->breed = $request->input('breed');
        $pet->age = $request->input('age');
        $pet->weight = $request->input('weight');
        $pet->client_id = $request->input('client_id');

        $photo = Storage::disk('public')->put(
            "pets",
            $request->file('photo')
        );

        $pet->photo = $photo;

        //save the object
        $pet->save();


        //flash success message
        session()->flash('success_message', 'Pet Saved Successfuly');


        //redirect to  next page (edit)

        return redirect()->route('client-edit', [$pet->client_id]);
    }



    // displays the form to edit an existing author

    public function editPet($id)
    {
        //find the existing object

        $pet = Pet::findOrFail($id);


        return view('clinic.edit_pet')->with('pet', $pet);
    }


    // handles the submission of the EDIT form
    public function updatePet(Request $request, $id)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'name' => 'required',
        //         '' => 'required'
        //     ],
        //     [

        //         'first_name.required' => 'Just give us the name, man!',
        //         'surname.required' => 'Just give ur surname !',

        //     ]

        // );



        //find the existing object
        $pet = Pet::findOrFail($id);

        //fill object with request data
        $pet->name = $request->input('name');
        $pet->breed = $request->input('breed');
        $pet->age = $request->input('age');
        $pet->weight = $request->input('weight');



        //save the object
        $pet->save();

        //flash success message
        session()->flash('success_message', 'Pet updated Successfuly');


        //redirect to  next page (edit)

        return redirect()->route('client-edit', [$pet->client_id]);
    }




    public function deletePet($pet_id)
    {

        $pet = Pet::findOrFail($pet_id);

        $pet->delete();
        session()->flash('success_message', 'Pet deleted Successfuly');

        return redirect()->route('client-edit', [$pet->client_id]);
    }
}
