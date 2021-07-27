<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use App\Models\Client;

class StHectorsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_string = file_get_contents("C:\web\hackatons\Hackaton-3\clinic_hackathon\database\seeders\clients.json"); // replace path with a real path
        $data = json_decode($json_string); // decode the string into data
        DB::table('clients')->truncate();
        DB::table('pets')->truncate();


        foreach ($data as $client) {

            $entry = new Client;

            $entry->first_name = $client->first_name;
            $entry->surname = $client->surname;
            $entry->save();

            foreach ($client->pets as $pet) {
                $pet_link = new Pet;

                $pet_link->name = $pet->name;
                $pet_link->breed = $pet->breed;
                $pet_link->weight = $pet->weight;
                $pet_link->age = $pet->age;
                $pet_link->photo = $pet->photo;
                $pet_link->client_id = $entry->id;
                $pet_link->save();
            }
        }
    }
}
