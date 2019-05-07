<?php

namespace App\Http\Controllers;

use App\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller {
    public function userRight () {
        return view('System/userRight');
    }
}