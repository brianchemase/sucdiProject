<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    //
    public function SendSMSNotifications()
    {

        $phone="0768459127";
        $message="Dear Client, Here is your message";

        //$Notify = $this->SendNotification($phone, $message);
      

       $data = DB::table('tbl_clients_data')
        ->select('NAMES', 'phone', 'expirydate','PLATE')
        ->get();


        // Loop through the data
            foreach ($data as $item) {
                $applicant = $item->NAMES;
                $name = strtok($applicant, ' ');
                $phone = $item->phone;
                $Plate = $item->PLATE;
                $expiryDate = $item->expirydate;

                // Process or output the obtained data as needed
                // For example, you can echo the values
                //echo "Name: $name, Phone: $phone, Plate: $Plate, Expiry Date: $expiryDate<br>";

                $message="Dear $name, Sucdi Insurance Agency wishes to inform you that, the insurance of your $Plate is expiring on $expiryDate\n
                Kindly insure your vehicle with an affordable price with Sucdi Insurance Agency.\n          
                Garissa Office, Gateway Bus Station, Kilas Building Next To Getune Academy\n 
                Tel No 0724 708020";

                  $Notify = $this->SendNotification($phone, $message);
                //echo $message;
            }

            return "SMS sent";


    }

    public function SendThanksSMSNotifications()
    {
        $data = DB::table('tbl_client_to_notify')
        //->select('NAMES', 'phone', 'expirydate','PLATE')
        ->get();

        foreach ($data as $item) {

            $phone = $item->phone;
            $message= "Dear Client,\nThank You for Insuring your Vehicle with Sucdi Insurance Agency\nGarissa Office 0724 708020\nHagader Office 0714 389755\nDagahaley Office  0740 207080";
            $Notify = $this->SendNotification($phone, $message);
            echo "$message<br>";

        }

        return "Notifications sent";

    }



    public function SendNotification($phone, $message)
    {
        set_time_limit(10000); // Set to a higher value than the default
       
        $tel = $phone; // Copy the original phone number
        $code = "254";

        // Check if the phone number starts with "254"
        if (substr($tel, 0, 3) !== "254") {
            // Check if the phone number starts with "07"
            if (substr($tel, 0, 2) === "07") {
                // Remove the first zero and add the country code
                $tel = $code . substr($tel, 1);
            } else {
                // Add the country code to other cases
                $tel = $code . $tel;
            }
        }

             $to = $tel;
             //return $to;

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

                //return $response;
    }
}
