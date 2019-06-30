<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class WordAdmin
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
        $type=Auth::user()->type;
        if(Auth::check() && $type!=4){
            switch ($type) {
                case 1:
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
