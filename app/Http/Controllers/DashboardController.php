<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
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

        //$monthly_covers="6";
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

        $today = Carbon::today();

        // Get the start and end dates of the current week
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        // Get the start and end dates of the next week
        $startOfNextWeek = Carbon::now()->addWeek()->startOfWeek();
        $endOfNextWeek = Carbon::now()->addWeek()->endOfWeek();
    
        // Get the start and end dates of the current month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

         // Query the issuedcovers table for covers expiring today
        $countExpiringCoversToday = DB::table('issuedcovers')
            ->whereDate('end_date', $today) // Covers ending today
            ->count();

        // Query the issuedcovers table for covers expiring this week
        $countExpiringCoversThisWeek = DB::table('issuedcovers')
            ->whereBetween('end_date', [$startOfWeek, $endOfWeek]) // Covers expiring this week
            ->count();

        // Query the issuedcovers table for covers expiring next week
        $countExpiringCoversNextWeek = DB::table('issuedcovers')
            ->whereBetween('end_date', [$startOfNextWeek, $endOfNextWeek]) // Covers expiring next week
            ->count();

        // Query the issuedcovers table for covers expiring this month
        $countExpiringCoversThisMonth = DB::table('issuedcovers')
            ->whereBetween('end_date', [$startOfMonth, $endOfMonth]) // Covers expiring this month
            ->count();


        // Query the issuedcovers table for covers issued within the current month
        $countCoversIssuedThisMonth = DB::table('issuedcovers')
        ->whereBetween('start_date', [$startOfMonth, $endOfMonth]) // Covers issued this month
        ->count();




        //return $branchDistribution;
        
        $data=[
            'total_customers' => $total_customers,
            'active_covers' => $active_covers,
            'active_branches' => $active_branches,
            'active_policies' => $active_policies,
            'revenue_amount' => $revenue_amount,
            'monthly_covers' => $countCoversIssuedThisMonth,
            'monthly_revenue' => $monthly_revenue,
            'monthly_expiering' => $monthly_expiering,
            'countExpiringCoversToday' => $countExpiringCoversToday,
            'countExpiringCoversThisWeek' => $countExpiringCoversThisWeek,
            'countExpiringCoversNextWeek' => $countExpiringCoversNextWeek,
            'countExpiringCoversThisMonth' => $countExpiringCoversThisMonth,
            'countCoversIssuedThisMonth' => $countCoversIssuedThisMonth,
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
}
