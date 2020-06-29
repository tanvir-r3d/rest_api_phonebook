<?php

namespace App\Http\Controllers;

use App\PhoneBook;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;

class PhoneBookController extends Controller
{
    public function onInsert(Request $request)
    {
        $key = env('TOKEN_KEY');
        $token = $request->input('token');
        $decoded=(array)JWT::decode($token, $key, array('HS256'));
        
        $phone_username=$decoded['user'];
        $phone_number = $request->input('phone_number');
        $phone_name = $request->input('phone_name');
        $phone_email = $request->input('phone_email');
        $phone_city = $request->input('phone_city');
        $phone_number_2 = $request->input('phone_number_2');

        $result=PhoneBook::insert([
            'phone_username'=>$phone_username,
            'phone_number'=>$phone_number,
            'phone_name'=>$phone_name,
            'phone_email'=>$phone_email,
            'phone_city'=>$phone_city,
            'phone_number_2'=>$phone_number_2
        ]);
        if ($result==true) 
        {
            $response=['Status'=>'200','Message'=>'Insert Success'];
        }
        else
        {
            $response=['Status'=>'401','Message'=>'Failed'];
        }
        return response()->json($response);
    }

    public function onDelete(Request $request)
    {
        $key = env('TOKEN_KEY');
        $token = $request->input('token');
        $decoded=(array)JWT::decode($token, $key, array('HS256'));
        $phone_username=$decoded['user'];

        $phone_name = $request->input('name');
        $result=PhoneBook::where(['phone_username'=>$phone_username,'phone_name'=>$phone_name])->delete();
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

    public function onSelect(Request $request)
    {
        $key = env('TOKEN_KEY');
        $token = $request->input('token');
        $decoded=(array)JWT::decode($token, $key, array('HS256'));
        
        $phone_username=$decoded['user'];
        $data=PhoneBook::where('phone_username',$phone_username)->get();
        return response()->json($data);
    }
}
