<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   if(!Session::has('name'))
        {   

        return redirect()->action('AdminController@signin')->with('flash_message_error','Please Sign in to access');

        }
        return $next($request);
    }
}