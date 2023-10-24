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
}
