<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\TestingMail;
use App\Mail\EndingCovers;
use Mail;
use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SendMailController extends Controller
{
    //
    public function Testemail()
    {

        $email="brianchemo@gmail.com";

        Mail::to($email)->send(new TestingMail());
        return "email here";


    }

    public function EndingissuedCovers(Request $request)
	{


        $tomorrow = Carbon::now()->addDay(); // Get tomorrow's date

        $issuedCoversTomorrow = DB::table('issuedcovers')
            ->select('issuedcovers.*', 'clients_data.client_names', 'clients_data.national_id', 'clients_data.*', 'policies.policy_code', 'policies.policy_name')
            ->join('clients_data', 'issuedcovers.customer_id', '=', 'clients_data.national_id')
            ->join('policies', 'issuedcovers.policyid', '=', 'policies.id')
            ->whereDate('issuedcovers.end_date', $tomorrow)
            ->get();

        $data = [
            'title' => 'Ending Issued Covers Clients List',
            'date' => date('d/m/Y'),
            'issuedCovers' => $issuedCoversTomorrow
            ];

            $pdf = PDF::loadView('report.EndingIssuedCovers', $data);
            $pdf->setPaper('L', 'landscape');
             // return $pdf->stream("Registered_clientsCovers.pdf");
             $email="ahmeywali@sucdiagency.com";


              Mail::to($email)
              ->cc(['brian.anikayi@yopmail.com'])
              ->send(new EndingCovers($pdf));

              return "Email Sent";

             


    }

    

    
}
