<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckCandidateCredential
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
        // dd(Session::get('role'));

        if(Session::get('role')=='Voter' || Session::get('id')==''){

            Session::flash('success', 'You have to Login First!!');
            return redirect()->route('home');
        }
        

        return $next($request);
    }
}
