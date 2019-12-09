<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Membership extends Controller
{
    //
    public function getMembers(){
        return view("Admin.Membership.Membership");
    }
}
