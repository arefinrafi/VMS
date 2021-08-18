<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use App\Admin;

class CheckAdmin
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

          /*if(!Session::has('name')=='Super Admin')*/
            if ($request->input('name')=='Super Admin'){

        //  $admins = Admin::where('type', '=','super admin')->first();{
        // return redirect()->action('AdminController@dashboard')->with(compact("admins"));
                return redirect()->action('AdminController@dashboard')->with('flash_message_error','You have no access for this module');
        }
        return $next($request);
    }
}
