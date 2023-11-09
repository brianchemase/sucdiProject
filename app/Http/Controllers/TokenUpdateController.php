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

    public function sendsms()
    {
                
        // API Endpoint
        $apiUrl = 'https://apis.onfonmedia.co.ke/v2_send';

        // Access Token
        $accessToken = 'Basic YWU1ZTU0NDAtMzk2OC00NDIyLTgwMTgtZmViMjdjZWJkMjAxOm1yYlpuaWRaTDFhaXNHaFJlbTV5UTM4djFEakZaWGRGYW1ZcFJyMjFZdFE9';
        $accessToken = DB::table('tbl_onfon_token')->select('token')->orderBy('id', 'desc')->value('token');
        //return $accessToken;

        // Request data
        $requestData = array(
            'to' => '0725670606',
            'from' => 'SUCDIAGENCY',
            'content' => 'message content to send',
            'dlr' => 'yes',
            'dlr-url' => 'http://192.168.202.54/dlr_receiver.php',
            'dlr-level' => 1,
        );

        // Convert the data to JSON format
        $jsonData = json_encode($requestData);
        //return $jsonData;
        // Initialize cURL session
        $ch = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json',
            'Content-type: application/json',
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'cURL Error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Output the API response
        echo $response;




    }

    public function deliversms()
    {
        $phone="0725670606";// Brian
        $client_fname = strtok($applicant, ' ');
            $tel= substr($phone, 1);
            $code="254";
            $to = $code.$tel;
            $message="This is a test sms.";

        $ApiKey = 'mrbZnidZL1aisGhRem5yQ38v1DjFZXdFamYpRr21YtQ=';
        $ClientId = 'ae5e5440-3968-4422-8018-feb27cebd201';
        $SenderId = 'SUCDIAGENCY';
        $AccessKey = 'mwNYuBUe0fxbYqDyyYkz9gsgNIH5cP0H';
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.onfonmedia.co.ke/v1/sms/SendBulkSMS",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n  \"SenderId\": \"".$SenderId."\",\n  \"MessageParameters\": [\n    {\n      \"Number\": \"".$to."\",\n      \"Text\": \"".$message."\"\n    }\n  ],\n  \"ApiKey\": \"".$ApiKey."\",\n  \"ClientId\": \"".$ClientId."\"\n}",
        CURLOPT_HTTPHEADER => array(
            "accesskey: ".$AccessKey."",
            "cache-control: no-cache",
            "content-type: application/json"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    }
}
