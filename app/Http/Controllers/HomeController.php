<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function dashboard()
    {
        $data=[

        ];

        return view ('insuarance.dashboard')->with($data);
    }

    public function table()
    {
        $data=[
            
        ];

        return view ('insuarance.table')->with($data);
    }
}
