<?php

namespace App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;

use Closure;

class AthuMiddelware
{

    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            // get user Information
            $User = Auth::user();
            // admin 
            if($User->role == 1){
                return $next($request);
            }            
        }
        return redirect()->route('Login');
    }
}
