<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(Request $request){
        $data = [
            [
                'name','age'
            ],
            [
                'shi','12'
            ],
            [
                'cheng','70'
            ],
        ];
        // echo $request->getMethod();
        return view('home.login',['data'=>$data]);
    }
    public function csrf_verify(){
        echo "成功";
    }
}
