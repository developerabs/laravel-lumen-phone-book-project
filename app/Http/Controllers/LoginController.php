<?php

namespace App\Http\Controllers;

use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\RegistationModel;

class LoginController extends Controller
{
    public function onLogin(Request $request)
    {
        $user_name = $request->input('user_name');
        $password = $request->input('password');
        $userCount = RegistationModel::where(['user_name' => $user_name, 'password' => $password])->count();
        if ($userCount == 1) {
            $key = env('TOKEN_KEY');
            $payload = array(
                "website" => "http://demo.com",
                "user" => $user_name,
                "iat" => time(),
                "nbf" => time()+3600
            );
            $jwt = JWT::encode($payload, $key);
            return response()->json(['Token'=>$jwt,'Status'=>"Login success"]);
        } else {
            return "Something went wrong";
        }
    }
}
