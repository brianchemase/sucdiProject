<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function dashboard()
    {   

        $total_customers="25";
        $total_customers = DB::table('clients_data')->count();

        $active_covers="26";
        $active_covers = DB::table('issuedcovers')->count();
        
        $active_policies="12";
        $active_policies = DB::table('policies')->count();
        $revenue_amount="352";

        $monthly_covers="6";
        $monthly_revenue="2600";
        $monthly_expiering="2";// covers coming to an end




        $data=[
            'total_customers' => $total_customers,
            'active_covers' => $active_covers,
            'active_policies' => $active_policies,
            'revenue_amount' => $revenue_amount,
            'monthly_covers' => $monthly_covers,
            'monthly_revenue' => $monthly_revenue,
            'monthly_expiering' => $monthly_expiering,


        ];

        return view ('insuarance.dashboard')->with($data);
    }

    public function table()
    {
        $data=[
            
        ];

        return view ('insuarance.table')->with($data);
    }

    public function blank()
    {
        $data=[
            
        ];

        return view ('insuarance.blankpage')->with($data);
    }


    public function form()
    {
        $data=[
            
        ];

        return view ('insuarance.formpage')->with($data);
    }

    
}
