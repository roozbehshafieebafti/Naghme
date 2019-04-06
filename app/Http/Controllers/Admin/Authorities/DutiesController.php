<?php

namespace App\Http\Controllers\Admin\Authorities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Authorities;
use App\Model\Duties;

class DutiesController extends Controller
{
	//getDuties collect the titles from Authorities table and sends them to view
    public function getDuties(){
    	$AuthoritiesTitle = Authorities::select('authorities_title')->distinct()->get();
    	return view('Admin.Authorities.Duties.Duties',compact('AuthoritiesTitle'));
    }

    //
    public function createDuties($dutuTitle){
    	$Duties = Duties::where('ad_authorities_title',$dutuTitle)->get();
    	return view('Admin.Authorities.Duties.DutiesList',compact('Duties','dutuTitle'));
    }
}
