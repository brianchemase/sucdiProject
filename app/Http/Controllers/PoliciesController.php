<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliciesController extends Controller
{
    //
    public function policiestab()
    {

        $policies = DB::table('policies')->get();
        $data=[

            'policies'=> $policies,
            
        ];

        return view ('insuarance.policiespage')->with($data);
    }

    public function savepolicy(Request $request)
    {
        $request->validate([
            'policy_code' => 'required',
            'policy_name' => 'required',
            'policy_description' => 'required',
            'policy_duration' => 'required',
            'policy_cost' => 'required',
            
        ]);

         // Attempt to insert the data into the "policies" table
        try {
            DB::table('policies')->insert([
                'policy_code' => $request->input('policy_code'),
                'policy_name' => $request->input('policy_name'),
                'policy_status' => 'ACTIVE',
                'policy_description' => $request->input('policy_description'),
                'policy_duration' => $request->input('policy_duration'),
                'policy_cost' => $request->input('policy_cost'),
            ]);

            // If the insertion is successful, return a success response
            //return redirect()->back()->with('success', 'Policy saved successfully');
            return back()->with('success', 'Policy saved successfully');
        } catch (\Exception $e) {
            // If there's an error, return an error response
            return redirect()->back()->with('error', 'Failed to save policy: ' . $e->getMessage());
        }


    }
}
