<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth()->user()->usertype=='user'){
            return $next($request);
       }

       return redirect('/img/401_error.jpg');

    //    return redirect()->route('user_Login')->with('success', 'At first You should to login');

    }
}
