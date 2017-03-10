<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class AdministratorMiddleware
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
        if(Auth::user()->clearance == 1)
            return $next($request);

        Session::flash('error', 'Мора да сте најавени како администратор');
        return redirect('/');
    }
}
