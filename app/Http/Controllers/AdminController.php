<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Pet;

class AdminController extends Controller
{


    //CREATE A NEW OBJECT/DATA IN OUR DATABASE
    public function create()
    {
        $client = new Client;

        return view('clinic.create_client')
            ->with('client', $client);
    }


    // HANDLE DATA AFTER SUBMISSION

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required',
                'surname' => 'required'
            ],
            [

                'first_name.required' => 'Just give us the name, man!',
                'surname.required' => 'Just give ur surname !',

            ]

        );


        //Prepare empty object
        $client = new Client;

        //fill object with request data
        $client->first_name = $request->input('first_name');
        $client->surname = $request->input('surname');


        //save the object
        $client->save();

        //flash success message
        session()->flash('success_message', 'Author Saved Successfuly');


        //redirect to  next page (edit)

        return redirect()->route('client-edit', [$client->id]);
    }

    // displays the form to edit an existing author

    public function edit($id)
    {
        //find the existing object

        $client = Client::with('pets')->findOrFail($id);


        return view('clinic.edit')->with('client', $client);
    }


    // handles the submission of the EDIT form
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required',
                'surname' => 'required'
            ],
            [

                'first_name.required' => 'Just give us the name, man!',
                'surname.required' => 'Just give ur surname !',

            ]

        );



        //find the existing object
        $client = Client::findOrFail($id);

        //fill object with request data
        $client->first_name = $request->input('first_name');
        $client->surname = $request->input('surname');


        //save the object
        $client->save();

        //flash success message
        session()->flash('success_message', 'Client updated Successfuly');


        //redirect to  next page (edit)

        return redirect()->route('client-edit', [$client->id]);
    }
}
