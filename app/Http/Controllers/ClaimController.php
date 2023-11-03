<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClaimController extends Controller
{
    //

    public function RegisteredClaims()
    {
        $clients = DB::table('clients_data')->get(); // Fetch all client data

        $result = DB::select("
            SELECT 
                cd.*, 
                ic.*, 
                c.*
            FROM 
                clients_data AS cd
            JOIN 
                issuedcovers AS ic ON cd.national_id = ic.customer_id
            JOIN 
                claims AS c ON c.PolicyID = ic.id
        ");

        //return $result;

        $data=[
            //'clientdata'=> $clients,
            'clientdata'=> $result,
            
        ];

        return view ('insuarance.claimstable')->with($data);
    }

    public function RegisterClaim(Request $request)
    {

        $result="";
        $issuedCovers = DB::table('issuedcovers')
        ->select('issuedcovers.*', 'clients_data.client_names')
        ->join('clients_data', 'issuedcovers.customer_id', '=', 'clients_data.national_id')
        ->get();

        $issuedCovers = DB::table('issuedcovers')
        ->select('issuedcovers.*', 'clients_data.*', 'policies.policy_code', 'policies.policy_name')
        ->join('clients_data', 'issuedcovers.customer_id', '=', 'clients_data.national_id')
        ->join('policies', 'issuedcovers.policyid', '=', 'policies.id')
        ->get();
       // return $issuedCovers;

        $clients = DB::table('clients_data')->get();

         //return $clients_list;
         if(isset($_GET['q']))
         {    
             $clientid=$_GET['q'];
             $results=$_GET['q'];

             $selectedOption = $request->input('q');
             $selectedValues = explode(',', $selectedOption);
             $clientid = $selectedValues[0];
             $refno = $selectedValues[1];

             $clients = DB::table('clients_data')->get();

             $clientData = DB::table('clients_data')
                //->select('client_names')
                ->where('id',  $clientid)
                ->orderBy('id', 'desc')
                ->first();


                $coverdata = DB::table('issuedcovers')
                ->select('issuedcovers.*', 'clients_data.*', 'policies.policy_code', 'policies.policy_name')
                ->join('clients_data', 'issuedcovers.customer_id', '=', 'clients_data.national_id')
                ->join('policies', 'issuedcovers.policyid', '=', 'policies.id')
                ->where('issuedcovers.refno', $refno) // Add the WHERE condition
                ->first();

             $data=[
                'issuedCovers'=> $issuedCovers,
                'clientdata'=> $clients,
                'results' => $results,
                'clientData' => $clientData,
                'coverdata' => $coverdata,     
            ];
    
            return view ('insuarance.ClaimsRegistration')->with($data);
         }
       
        //return $issuedCovers;

        $data=[
            'issuedCovers'=> $issuedCovers,
            'clientdata'=> $clients,
        ];

        return view ('insuarance.ClaimsRegistration')->with($data);
    }

    public function saveclaim(Request $request)
    {
        // Validate the request data
        $request->validate([
            'claimDate' => 'required|date',
            'claimAmount' => 'required|numeric',
            'claimdescription' => 'required|string',
            // You may add more validation rules as needed
        ]);


        $policynumber = DB::table('issuedcovers')
        ->where('refno', $request->input('refno'))
        ->value('id');

        // Save the data to the "claims" table using the DB facade
        $claimStatus = 'pending'; // Default status
        $result = DB::table('claims')->insert([
            'PolicyID' => $policynumber,
            'ClaimDate' => $request->input('claimDate'),
            'ClaimStatus' => $claimStatus,
            'ClaimDetails' => $request->input('claimdescription'),
            'ClaimAmount' => $request->input('claimAmount'),
        ]);
        
        if ($result) {
            // Update the issuedcovers table
            DB::table('issuedcovers')
            ->where('refno', $refno)
            ->update(['status' => 'claim']);
            // Data was inserted successfully
            return back()->with('success', 'Claim record saved successfully.');
           
        } else {
            // Data insertion failed
            return back()->with('error', 'Failed to save claim record. Please try again or contact Admin.');
        }
        
    }
}
