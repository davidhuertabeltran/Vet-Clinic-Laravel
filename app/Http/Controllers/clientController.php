<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;


class clientController extends Controller
{
    public function index()
    {



        $clients = Client::orderBy('first_name', 'asc')
            ->with('pets')
            ->get();



        return view('clinic.index')->with('clients', $clients);
    }

    public function show($id)
    {

        $client = Client::with('pets')->findOrFail($id);

        return view('clinic.client')
            ->with('client', $client);
    }




    public function pet($id, $pet_id)
    {

        $client = Client::with('pets')->findOrFail($id);
        $pet = Pet::findOrFail($pet_id);

        return view('clinic.pet')
            ->with('pet', $pet)
            ->with('client', $client);
    }







    public function search(Request $request)
    {

        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $clients = Client::with('pets')
            ->where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('surname', 'LIKE', "%{$search}%")
            ->get();



        // Return the search view with the resluts compacted
        return view('clinic.search', compact('clients'));
    }
}
