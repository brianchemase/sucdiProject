<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssuedCoversController extends Controller
{
    //

    public function issuedCovers()
    {
        $policies = DB::table('policies')->get();

        $clientNames = DB::table('clients_data')->get();
        $issuedCovers = DB::table('issuedcovers')
        ->select('issuedcovers.*', 'clients_data.client_names')
        ->join('clients_data', 'issuedcovers.customer_id', '=', 'clients_data.national_id')
        ->get();
        //return $policies;

        $issuedCovers = DB::table('issuedcovers')
        ->select('issuedcovers.*', 'clients_data.client_names', 'policies.policy_code', 'policies.policy_name')
        ->join('clients_data', 'issuedcovers.customer_id', '=', 'clients_data.national_id')
        ->join('policies', 'issuedcovers.policyid', '=', 'policies.id')
        ->get();

       
        $data=[
            'policies'=> $policies,
            'clientNames'=> $clientNames,
            'issuedCovers'=> $issuedCovers,
            
        ];

        return view ('insuarance.issuedpoliciespage')->with($data);
    }

    public function saveissuedCover(Request $request)
    {

        $request->validate([
            'client_id' => 'required',
            'policy_id' => 'required',
            'start_date' => 'required|date',
            'plate_number' => 'required|string',
            'chasis_number' => 'required|string',
            'amountfee' => 'required|numeric',
            'comment' => 'nullable|string',
        ]);

       // return $request->all();

        try {

            $startDate = Carbon::parse($request->input('start_date'));
            $endDate = $startDate->copy()->addYear();




            DB::table('issuedcovers')->insert([
                'policyid' => $request->input('policy_id'),
                'customer_id' => $request->input('client_id'),
                'start_date' => $startDate,
                'end_date' => $endDate, // Save the calculated end_date
                'chasis_number' => $request->input('chasis_number'),
                'status' => 'running',
                'PremiumAmount' => $request->input('amountfee'),
                'coverdetails' => $request->input('comment'),
                // Add other fields as needed
            ]);
    
            //return redirect()->back()->with('success', 'Cover Policy saved successfully');
            return back()->with('success', 'Cover Policy saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }




    }


}
