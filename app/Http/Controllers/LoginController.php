<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {
    public function login () {
        return view('login/login');
    }
    /**
     * @登录验证
     * @param $request object
     */
    public function loginVerify (Request $request) {
        if ($request->isMethod('POST')) {
            $result = DB::table('user')
                ->where('username', '=', $_POST['username'])
                ->where('password', '=', md5($_POST['password']))
                ->get();
            print_r($result);
        }
    }
}