<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    //

    public function ClientsRegistration()
    {
        $data=[
            
        ];

        return view ('insuarance.ClientsRegistration')->with($data);
    }



    public function ClientsList()
    {
        $data=[
            
        ];

        return view ('insuarance.clientstable')->with($data);
    }

    public function SearchClient()
    {
        $data=[
            
        ];

        return view ('insuarance.SearchClientsRegistered')->with($data);
    }
}
