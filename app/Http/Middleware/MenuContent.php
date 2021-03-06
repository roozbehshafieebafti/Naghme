<?php

namespace App\Http\Middleware;
use Closure;
use App\Model\Authorities;
use Illuminate\Support\Facades\DB;

class MenuContent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!isset($_SESSION['Authorities'])){
            // $AuthoritiesTitle = DB::select('SELECT authorities_unit_title 
            // from authorities 
            // WHERE authorities_city_id = 1 
            // group by authorities_unit_title
            
            // ');
            $Ath= ["شورای مرکزی","دبیر","روابط عمومی و تشریفات","برنامه ریزی راهبردی","گروه های تخصصی","مشاوران"];
            $_SESSION['Authorities'] = $Ath;
            // ORDER BY authorities_unit_title_primary
        }
        if(!isset($_SESSION['Activities'])){
            $RawActivities = DB::select('SELECT at_title , sat_title 
            FROM activities_title LEFT JOIN sub_activity_title 
            ON activities_title.id = sub_activity_title.sat_parent_actitvity ');
            $Activites = [];
            foreach($RawActivities as $value){
                if($value->sat_title == null){
                    $Activites[$value->at_title] = 'null';
                    continue;
                }
                $Activites[$value->at_title][]= $value->sat_title;
            }
            $_SESSION['Activities'] =  $Activites;
        }
        return $next($request);
    }
}
