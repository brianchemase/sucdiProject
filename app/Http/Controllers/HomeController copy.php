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
        $active_branches = DB::table('tbl_branches')->count();
        $revenue_amount="352";

        $monthly_covers="6";
        $monthly_revenue="2600";
        $monthly_expiering="2";// covers coming to an end


        $branchDistribution = DB::table('tbl_branches as b')
        ->leftJoin('clients_data as c', 'b.id', '=', 'c.branchcode')
        ->select('b.branchName', DB::raw('COUNT(c.branchcode) as clientCount'))
        ->groupBy('b.branchName')
        ->orderBy('b.branchName')
        ->get();
        $chartData = [
            ['Branch Name', 'Clients'],
        ];
        
        foreach ($branchDistribution as $branch) {
            $chartData[] = [$branch->branchName, $branch->clientCount];
        }

        $statusCounts = DB::table('issuedcovers')
        ->select('status', DB::raw('COUNT(*) as status_count'))
        ->groupBy('status')
        ->get();


        //return $branchDistribution;
        
        $data=[
            'total_customers' => $total_customers,
            'active_covers' => $active_covers,
            'active_branches' => $active_branches,
            'active_policies' => $active_policies,
            'revenue_amount' => $revenue_amount,
            'monthly_covers' => $monthly_covers,
            'monthly_revenue' => $monthly_revenue,
            'monthly_expiering' => $monthly_expiering,
           // 'branchDistribution' => $branchDistribution,
        ];

        return view ('insuarance.dashboard',compact('chartData','statusCounts'))->with($data);
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

    public function login()
    {
        return view ('auth.login');
    }

    
}
