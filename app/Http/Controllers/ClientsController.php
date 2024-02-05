<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    //

    public function ClientsRegistration()
    {
        $branches = DB::table('tbl_branches')->get(); // Fetch all client data

        $data=[
            'branches'=> $branches,
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
            'client_kra' => 'required',
            'branch_id' => 'required',
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
            'branchcode' => $validatedData['branch_id'],
            'kra_pin' => $validatedData['client_kra'],
        ]);

        if ($inserted) {
            // Data successfully stored
            return back()->with('success', 'Client bio data saved successfully!');
        } else {
            // Failed to store data
            return back()->with('error', 'Failed to save client data. Please try again.');
        }
    }


    public function ClientsRegistrationedit($id)
    {
        $client = DB::table('clients_data')->where('id', $id)->first(); // Replace 'clients' with your actual table name
        $branches = DB::table('tbl_branches')->get(); // Fetch all client data

        //return $client;

        $data=[
            'branches'=> $branches,
            'client'=> $client,
        ];

        return view ('insuarance.ClientsRegistrationupdate')->with($data);
    }


    public function ClientsRegistrationupdate(Request $request, $id)
    {
        try {
            // Update the validated data in the database using DB facade
            $affectedRows = DB::table('clients_data')
                ->where('id', $id)
                ->update([
                    'client_names' => $request->input('client_names'),
                    'national_id' => $request->input('national_id'),
                    'DOB' => $request->input('date_reg'),
                    'phone' => $request->input('client_phone'),
                    'email' => $request->input('client_email'),
                    'home_residence' => $request->input('client_residence'),
                    'postal_address' => $request->input('client_postal_address'),
                    'postal_code' => $request->input('client_postalCode'),
                    'city' => $request->input('client_town'),
                    'country' => $request->input('client_country'),
                    'nationality' => $request->input('client_nationality'),
                    //'client_type' => $request->input('client_type'),
                    'branchcode' => $request->input('branch_id'),
                    'kra_pin' => $request->input('client_kra'),
                ]);
    
            if ($affectedRows > 0) {
                // Redirect with success message
                return redirect()->route('ListClients')->with('success', 'Client updated successfully');
            } else {
                // Redirect back with an error message
                return redirect()->back()->with('error', 'Failed to update client. No changes detected or there was an issue.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
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
