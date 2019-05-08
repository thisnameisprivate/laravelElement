<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Org\Net\IpLocation;

class LoginController extends Controller {
    /**
     * @@登录页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function login () {
        return view('login/login');
    }

    /**
     * @@登录验证
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|void
     *
     */
    public function loginVerify (Request $request) {
        if ($request->isMethod('POST')) {
            $result = DB::table('user')
                ->where('username', '=', $_POST['username'])
                ->where('password', '=', md5($_POST['password']))
                ->get();
            if (! empty($result)) {
                return redirect('System/userRight')->cookie('username', $_POST['username']);
            } else {
                return view('login/login');
            }
        }
    }

    /**
     * @@登录日志
     * @param $requestVerify
     * @param $boolean
     */
    private function loginLog ($requestVerify, $boolean) {
        $ips = get_client_ip();
        $ip = new IpLocation();
        $login_log['username']          = $requestVerify['username'];
        $login_log['password']          = md5($requestVerify['password']);
        $login_log['fromaddress']       = empty($ares['country']) ? '生产环境IP:localhost' : $ares['country'];
        $login_log['ip']                = $ips;
        $boolean ? $login_log['status'] = 'Login Success' : $login_log['status'] = 'Login Failed';
    }
}