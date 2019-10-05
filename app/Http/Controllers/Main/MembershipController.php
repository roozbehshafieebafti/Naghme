<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Model\UserScore;

class MembershipController extends Controller
{
    //
    public function getMembers(){
        $score = UserScore :: select("score_description")
                ->where("kind","score")
                ->get();
        $Memebership= true;
        return view('Main/Membership/Membership',compact("Memebership","score"));
    }
}
