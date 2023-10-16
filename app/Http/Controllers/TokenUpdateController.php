<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokenUpdateController extends Controller
{
    //


    public function generatenewonfontoken()
    {

        $url = 'https://apis.onfonmedia.co.ke/v1/authorization';
    $data = [
        "apiUsername" => "ae5e5440-3968-4422-8018-feb27cebd201",
        "apiPassword" => "mrbZnidZL1aisGhRem5yQ38v1DjFZXdFamYpRr21YtQ="
    ];

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    // Execute cURL session and get the response
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // You can process the $response variable containing the API response here
    // For example, you can decode the JSON response if it's JSON data:
    $responseData = json_decode($response, true);
   // return $responseData;
   $currentTime = date('Y-m-d H:i:s');


    DB::table('tbl_onfon_token')->insert([
        'token' => $responseData['token'],
        'date' => $currentTime
    ]);

        return $responseData;
    }
}
