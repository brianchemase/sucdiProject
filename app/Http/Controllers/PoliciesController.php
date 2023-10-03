<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliciesController extends Controller
{
    //
    public function policiestab()
    {
        $data=[
            
        ];

        return view ('insuarance.policiespage')->with($data);
    }
}
