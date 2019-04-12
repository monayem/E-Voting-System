<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckCredential
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
        if(Session::get('role')=='Candidate' || Session::get('id')=='' ){

            Session::flash('success', 'You have to Login First!!');
            return redirect()->route('home');
        }

            return $next($request);
   
    }
}
