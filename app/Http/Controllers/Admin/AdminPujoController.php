<?php

namespace App\Http\Controllers\Admin;

use App\SsParticipant as Ss;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SimpleExcel\SimpleExcel as excel;

class AdminPujoController extends Controller
{
    //

    /* protected $key = "m8TalDqA+WM-QKwBpr4xg2dXaamR5uZ1ubNJbBrrJe"; */
    protected $key = "lLhBd9wV1aA-yA9FwB1jwflVwOfFfOdGtGdszOv53G";	

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function list(){
        $sss = Ss::orderBy('validated', 'ASC')->get();
        $ssv = Ss::where('validated', true)->get();
        $sv = count($ssv);

        return view('functionalities.pujo.validate', ["sss"=>$sss, "sv"=>$sv]);
    }

    public function validatereg(Request $request, $id){
        $ss = Ss::find($id);

        
        $ssv = Ss::where('validated', true)->get();
        $sv = count($ssv);

        if($sv<600){
            if(!($ss->validated)){

                // Account details
                $apiKey = urlencode($this->key);
                
                $number = "91".$ss->contact;

                if($ss->pay == 'p'){
                    $payment = "Paytm";
                }else{
                    $payment = "Tez";
                }

                if($ss->food == 'v'){
                    $food = "Vegetarian";
                    $food_line = "We know you are a ".$food."! Delicious vegetarian food will be waiting for you at our dining arena during the Parikrama.";
                }else{
                    $food = "Non-Vegetarian";
                    $food_line = "We know you are a ".$food."! Delicious non-vegetarian food will be waiting for you at our dining arena during the Parikrama.";
                }

                $message_line = "Hello, ".$ss->name."! We are happy to confirm your registration for Rotary Rotaract Sharod Swikriti upon the receipt of Rs. 500/- via ".$payment.". ".$food_line." Hope you enjoy!";

                $shorter_msg_for_test = "Hello, ".$ss->name."!";

                //dd($message_line);
    
                // Message details
                $numbers = array($number);
                $sender = urlencode('RTRKOL');
                $message = rawurlencode($message_line);
            
                $numbers = implode(',', $numbers);
            
                // Prepare data for POST request
                $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
            
                // Send the POST request with cURL
                $ch = curl_init('https://api.textlocal.in/send/');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                
                //dd($response);

                // Process your response here
                $res = json_decode($response, true);

                if($res["status"]=="success"){
                    $ss->validated = true;
                    $ss->save();
                    return redirect('/admin/pujo')->with('success',$res["balance"]);
                }else{
                    return redirect('/admin/pujo')->with('failed','Could not send!');
                }    
            }
        }else{
            return redirect('/admin/pujo')->with('cannot','Could not send!');
        }

        
    }

    public function exportdata(){
        $excel = new excel('xml');
        $ssv = Ss::where('validated', true)->get();

        $export_data = [];

        $export_data[] = ['ID', 'Name', 'Club', 'Zone', 'Contact', 'Food Preference', 'Payment', 'Validated'];

        foreach($ssv as $sv){
            if($sv->pay == 'p'){
                $sv->pay = "Paytm";
            }else{
                $sv->pay = "Tez";
            }

            if($sv->food == 'v'){
                $sv->food = "Vegetarian";
                
            }else{
                $sv->food = "Non-Vegetarian";
            }

            if($sv->validated == true){
                $sv->validated = "YES";
                
            }else{
                $sv->validated = "NO";
            }
            $export_data[] = $sv->toArray();
        }

        $excel->writer->setData($export_data);

        $excel->writer->saveFile('pujo_awards_registrations');

        return redirect('/admin/pujo');
    }
}
