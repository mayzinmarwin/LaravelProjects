<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckUserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        //dd('got');
        if(Auth::check() && Auth::user()->status == 1){
            return $next($request);
        }
        else{
            Auth::logout();
            // $validator = Validator::make([], []);
            // return $validator->getMessageBag()->add('email', 'your account is deactivated');
            return redirect('/login')->with('warning','Your Account is deactivated');
        }
    }
}
