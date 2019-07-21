<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class userLogin
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
        if(empty(Session::has('userLogin'))){
            Session::put('calling_url',$request->getPathInfo());
            return redirect('/reg-login');
        }
        return $next($request);
    }
}
