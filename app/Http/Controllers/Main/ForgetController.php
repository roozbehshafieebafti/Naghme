<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgetController extends Controller
{
    //
    public function forgetPage () {
        $forget = "";
        return view("Main/Forget/Forget",compact("forget"));
    }
}
