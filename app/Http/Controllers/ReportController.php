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
            'title' => 'How To Create PDF File In Laravel 10 - Techsolutionstuff',
            'date' => date('d/m/Y'),
            'issuedCovers' => $issuedCovers
            ];

        
            
            $pdf = PDF::loadView('report.report', $data);
            //return view('report.report', $data);
            return $pdf->stream();


	        return $pdf->download('users_list.pdf');



    }
}
