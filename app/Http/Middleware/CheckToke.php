<?php

namespace App\Http\Middleware;

use Closure;

class CheckToke
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
        $res=session("res");
        if(!$res){
            return redirect("/login/create");
        }
        return $next($request);
    }
}
