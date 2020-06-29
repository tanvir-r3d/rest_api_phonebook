<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function onRegister(Request $request)
    {
       $this->validate($request,[
        'user_name'=>'required|unique:user_table',
        'user_password'=>'required'
        ]);
       
        $result=Registration::insert([
       'user_firstname'=> $request->input('user_firstname'),
       'user_lastname'=>$request->input('user_lastname'),
       'user_city'=>$request->input('user_city'),
       'user_name'=>$request->input('user_name'),
       'user_password'=>$request->input('user_password'),
       'user_gender'=>$request->input('user_gender')
       ]);
       if ($result==true) 
       {
            $response=['Status'=>'200','Message'=>'Success'];
       }
       else
       {
            $response=['Status'=>'401','Message'=>'Failed'];
       }
       return response()->json($response);
    }

}
