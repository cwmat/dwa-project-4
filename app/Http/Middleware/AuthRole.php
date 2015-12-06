<?php

namespace App\Http\Middleware;

use Closure;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $role)
    {
      if(auth()->check() && auth()->user()->level==$role){
        return $next($request);
      }

      \Session::flash('flash_message','You are not authorized to do that.');

      return redirect('/');
    }
}
