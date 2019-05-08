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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function visitSelect (Request $request) {
        if ($request->isMethod('GET')) {
            $tableName = Cookie::get('tableName');
            $datas = DB::table($tableName)->paginate($_GET['limit']);
            $datasTotal = $datas->total();
            return response()->json([
                'code'   => 0,
                'msg'    => '',
                'count'  => $datasTotal,
                'data'   => $datas->toArray()['data']
            ]);
        }
    }
}