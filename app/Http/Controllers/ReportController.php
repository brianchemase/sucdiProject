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

    public function generateDeclarations()
    {

        $data=[
            
        ];

        return view ('insuarance.Declarationsformpage')->with($data);
    }




    public function Declarations(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        //$month = 1; // Replace with your desired month
        //$year = 2024; // Replace with your desired year

            $results = DB::table('issuedcovers')
            ->select('issuedcovers.*', 'clients_data.client_names', 'clients_data.national_id', 'clients_data.*', 'policies.policy_code', 'policies.policy_name')
            ->join('clients_data', 'issuedcovers.customer_id', '=', 'clients_data.national_id')
            ->join('policies', 'issuedcovers.policyid', '=', 'policies.id')
            ->whereYear('issuedcovers.start_date', $year)
            ->whereMonth('issuedcovers.start_date', $month)
            ->get();
        //$month=date('M');
       // $year=date('Y');

      // $month = $request->input('month') ?? date('M');
      // $month = $request->filled('month') ? $request->input('month') : date('M');
       $monthName = date('F', mktime(0, 0, 0, (int)$month, 1));


        

        $data = [
            'title' => 'DAILY DECLARATION OF USED PRIVATE, PSV AND COMMERCIAL CERTIFICATE ',
            'date' => date('d/m/Y'),
            'month' => $monthName,
            'year' => $year,
            'results' => $results
            ];

        

            $pdf = PDF::loadView('report.DeclarationsCovers', $data);
            $pdf->setPaper('L', 'landscape');
              return $pdf->stream("Declatations.pdf");

    }
}
