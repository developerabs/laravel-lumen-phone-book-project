<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistationModel;

class RegistationController extends Controller
{
    public function onRegistation(Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $city = $request->input('city');
        $user_name = $request->input('user_name');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $user_count = RegistationModel::where('user_name',$user_name)->count();
        if($user_count !=0){
            return "This user is already Exists";
        }else{
            $result = RegistationModel::insert([
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'city'=>$city,
                'user_name'=>$user_name,
                'password'=>$password,
                'gender'=>$gender,
            ]);
            if ($result == true) {
                return "Registation Succefully";
            }else{
                return "Registation Fail ! Try Again";
            }
        }
    }
}
