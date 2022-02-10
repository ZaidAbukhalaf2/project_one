<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except('showString2');
    }

    public function showString0()
    {
        return "welcome0";
    }
    public function showString1()
    {
        return "welcome1";
    }
    public function showString2()
    {
        return "welcome2";
    }
    public function showString3()
    {
        return "welcome3";
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
}
