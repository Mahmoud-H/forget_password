<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OtpVerify;

class InsertController extends Controller
{
    public function index(){
        return view('insert_form');
    }
    public function generateOTP(){
        $otp = mt_rand(1000,9999);
        return $otp;
    }

    public function submitForm(){
        $name = request('name');
        $mobile = request('mobile');
        $email = request('email');
        $authKey =  env('AUTH_KEY',"");
        if($mobile==''){
            return json_encode(array('statusCode'=>400,'msg'=>"Mobile number not valid".$mobile));
        }
        // else if($authKey==""){
        //     return json_encode(array('statusCode'=>400,'msg'=>"sms gateway not intigrated"));
        // }
        else{
            //put in session
            $otp = $this->generateOTP();
            $message = 'you otp is '.$otp;
            //$number = '+91'.$mobile;
            //sms($number,$msg)
            // $route = "route=4";
			// 	/*Prepare you post parameters*/
			// 	$postData = array(
			// 	'authkey' => $authKey,
			// 	'mobiles' => $mobile,
			// 	'message' => $message,
			// 	'sender' => $senderId,
			// 	'route' => $route
			// 	);
			// 	/*API URL*/
			// 	$url="https://control.msg91.com/api/sendhttp.php";
			// 	/* init the resource */
			// 	$ch = curl_init();
			// 	curl_setopt_array($ch, array(
			// 	CURLOPT_URL => $url,
			// 	CURLOPT_RETURNTRANSFER => true,
			// 	CURLOPT_POST => true,
			// 	CURLOPT_POSTFIELDS => $postData
			// 	/*,CURLOPT_FOLLOWLOCATION => true*/
			// 	));
			// 	/*Ignore SSL certificate verification*/
			// 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			// 	/*get response*/
			// 	$output = curl_exec($ch);
			// 	/*Print error if any*/
			// 	if(curl_errno($ch))
			// 	{
            //     echo 'error:' . curl_error($ch);
            //     curl_close($ch);
            //     exit;
			// 	}
			// 	curl_close($ch);

           session(['name'=> $name]);
           session(['mobile'=> $mobile]);
           session(['email'=> $email]);
           session(['otp' => $otp]);
            return json_encode(array('statusCode'=>200,'msg'=>'otp sent successfully'.$otp));
        }
        
    }
    public function submitOtp(){
        $otp = trim(request('otp'));
        if($otp==''){
            return json_encode(array('statusCode'=>400,'msg'=>"otp not valid"));
        }
        else{
            $user = new OtpVerify;
            if($otp == session('otp')){
            $name = session('name');
            $mobile = session('mobile');
            $email = session('email');
            $user->save();
            session()->flush();
            json_code(array('statusCode'=>200,'msg'=>'sucess'));

            }
            else{
                return json_encode(array('statusCode'=>400,'msg'=>"otp not valid"));
            }
        }
    }
    public function show(){
        return view('home');
    }

}
