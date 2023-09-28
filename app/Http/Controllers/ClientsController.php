<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    //

    public function ClientsRegistration()
    {
        $data=[
            
        ];

        return view ('insuarance.ClientsRegistration')->with($data);
    }

    public function storeClient(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'client_names' => 'required|string',
            'national_id' => 'required|string',
            'date_reg' => 'required|date',
            'client_phone' => 'required|string',
            'client_email' => 'required|email',
            'client_residence' => 'required|string',
            'client_postal_address' => 'required',
            'client_postalCode' => 'required',
            //client_postalCode
            'client_town' => 'required|string',
            'client_country' => 'required|string',
            'client_nationality' => 'required|string',
            'client_type' => 'required|string',
        ]);

        // Store the validated data in the database using DB facade
        $inserted = DB::table('clients_data')->insert([
            'client_names' => $validatedData['client_names'],
            'national_id' => $validatedData['national_id'],
            'DOB' => $validatedData['date_reg'],
            'phone' => $validatedData['client_phone'],
            'email' => $validatedData['client_email'],
            'home_residence' => $validatedData['client_residence'],
            'postal_address' => $validatedData['client_postal_address'],
            'postal_code' => $validatedData['client_postalCode'],
            'city' => $validatedData['client_town'],
            'country' => $validatedData['client_country'],
            'nationality' => $validatedData['client_nationality'],
            'client_type' => $validatedData['client_type'],
        ]);

        if ($inserted) {
            // Data successfully stored
            return back()->with('success', 'Client bio data saved successfully!');
        } else {
            // Failed to store data
            return back()->with('error', 'Failed to save client data. Please try again.');
        }
    }



    public function ClientsList()
    {
        $clients = DB::table('clients_data')->get(); // Fetch all client data

        $data=[
            'clientdata'=> $clients,
            
        ];

        return view ('insuarance.clientstable')->with($data);
    }

    public function SearchClient()
    {
        $clients = DB::table('clients_data')->get(); // Fetch all client data

        $data=[
            'clientdata'=> $clients,
            
        ];

        return view ('insuarance.SearchClientsRegistered')->with($data);
    }
}
