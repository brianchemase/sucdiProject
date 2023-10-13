<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function issuedCovers(Request $request)
	{

        $issuedCovers = DB::table('issuedcovers')
        ->select('issuedcovers.*', 'clients_data.client_names', 'clients_data.national_id', 'clients_data.*', 'policies.policy_code', 'policies.policy_name')
        ->join('clients_data', 'issuedcovers.customer_id', '=', 'clients_data.national_id')
        ->join('policies', 'issuedcovers.policyid', '=', 'policies.id')
        ->get();

       // return $issuedCovers;

        $data = [
            'title' => 'Issued Covers Clients List',
            'date' => date('d/m/Y'),
            'issuedCovers' => $issuedCovers
            ];

        

            $pdf = PDF::loadView('report.IssuedCovers', $data);
            $pdf->setPaper('L', 'landscape');
              return $pdf->stream("Registered_clientsCovers.pdf");


    }

    public function clientRegister(Request $request)
    {

        $clients = DB::table('clients_data')->get(); // Fetch all client data


        $data = [
            'title' => 'Registered Clients List',
            'date' => date('d/m/Y'),
            'clients' => $clients
            ];

        

            $pdf = PDF::loadView('report.clientRegister', $data);
            $pdf->setPaper('L', 'landscape');
              return $pdf->stream("Registered_clients_names.pdf");
    }
}
