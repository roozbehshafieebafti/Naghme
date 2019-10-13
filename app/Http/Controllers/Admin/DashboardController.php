<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    public function Index($id=1){
        $limit= 10;
        $registerdUser = User::orderBy('created_at','DESC')->offset($id-1)->limit($limit)->get();
        $count = User::count();
        $pages = ceil($count/$limit);
        
    	return view('Admin.Dashboard.Dashboard',compact('registerdUser','count','limit','id','pages'));
    }
}
