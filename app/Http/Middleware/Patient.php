<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Patient
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
        if(Auth::check() && Auth::user()->type!=2){
            switch (Auth::user()->type) {
                case 1:
                    return redirect('superadmin');
                    break;
                
                case 4:
                    return redirect('word_admin');
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        return $next($request);
    }
}
