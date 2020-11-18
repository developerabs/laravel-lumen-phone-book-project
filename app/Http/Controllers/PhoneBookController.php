<?php

namespace App\Http\Controllers;

use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\PhoneBookDetailsModel;

class PhoneBookController extends Controller
{
    function onInsert(Request $request)
    {
        $token = $request->input('access_token');
        $key = env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array = (array)$decoded;
        $user = $decoded_array['user'];
        $one = $request->input('one');
        $two = $request->input('two');
        $name = $request->input('name');
        $email = $request->input('email');
        $result = PhoneBookDetailsModel::insert([
            'username' => $user,
            'phone_number_one' => $one,
            'phone_number_two' => $two,
            'name' => $name,
            'email' => $email
        ]);
        if ($result == true) {

            return "Save Success";
        } else {
            return "Fail ! Try Again";
        }
    }
    function onSelect(Request $request){
        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array=(array)$decoded ;
        $user=$decoded_array['user'];
        $result=PhoneBookModel::where('user_name', $user)->get();
    
        return  $result;
        
    }
    function onDelete(Request $request){
        $email=$request->input('email');
        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array=(array)$decoded ;
        $user=$decoded_array['user'];
    
        $result=PhoneBookModel::where(['user_name'=>$user, 'email'=> $email])->delete();
    
    
        if($result==true){
            return "Delete Success";
        }
        else{
    
            return "Delete Fail! Try Again";
        }
    
    
        
    }
}
