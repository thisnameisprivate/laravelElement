<?php

namespace App\Http\Controllers;

use App\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller {
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userRight () {
        $username = Cookie::get('username');
        return view('System/userRight',
            [
                'username' => $username,
            ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page () {
        return view("System/page");
    }

    public function visitSelect () {
        if (isMethod('GET')) {
            print_r($_GET);
        }
    }
}