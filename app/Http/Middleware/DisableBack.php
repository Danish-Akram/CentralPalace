<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DisableBack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('LoggedUser') && (url('login') == $request->url() || url('signup') == $request->url() )){
            return back();
        }
        if(session()->has('LoggedUser')){
            return redirect()->route('home');
        }
        return $next($request);
        }
}
