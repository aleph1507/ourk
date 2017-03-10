<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class NastavnikMiddleware
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
        if(Auth::user()->clearance <= 2)
            return $next($request);
        

        Session::flash('success', 'Треба да сте најавени како наставник.');
        return redirect('/');
        
    }
}
