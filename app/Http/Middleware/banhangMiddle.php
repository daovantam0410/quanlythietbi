<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class banhangMiddle
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
        if(Auth::check()){
            if (Auth::User()->roleid==1) {
                return $next($request);
            }
        }else
            return redirect('dang-nhap');
    }
}
