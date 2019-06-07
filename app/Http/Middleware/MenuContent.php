<?php

namespace App\Http\Middleware;
use Closure;
use App\Model\Authorities;

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
            $AuthoritiesTitle = Authorities::select('id','authorities_title')->where('authorities_city_id',1)->distinct()->get();
            $_SESSION['Authorities'] = $AuthoritiesTitle;
        }
        return $next($request);
    }
}
