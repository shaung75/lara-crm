<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckOwner
{
    /**
     * Checks user is owner of customer
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            
            $user_id = Auth::user()->id; // get user id
            
            if($user_id != $request->route('customer')->user_id){
                return redirect()->route('customers');
            }
        }
        return $next($request);
    }
}
