<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use \Firebase\JWT\JWT;

class LoginController extends Controller
{

    public function onLogin(Request $request)
    {
    	$user_name = $request->input('user_name');
        $user_password = $request->input('user_password');
        $result=Registration::where(['user_name'=>$user_name,'user_password'=>$user_password])->count();
        if ($result==1) 
        {	
        	$key = env('TOKEN_KEY');
        	$payload = array(
        		'user'=>$user_name,
        		'iat'=>time(),
        		'exp'=>time()+3600
        		);
        	$token=JWT::encode($payload,$key);
        	return response()->json(['Token'=>$token,'Status'=>'Login Granted']);
        }
        else
        {
        	echo "Username or Password Invalid";
        }
    }
}
