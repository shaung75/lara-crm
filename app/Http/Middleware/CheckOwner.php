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
            
            /**
             * Check owner of Project
             */
            if($request->route('project')) 
            {
                $owner = \App\Project::find($request->route('project')->id);
                
                if($user_id != $owner->customer->user->id)
                {
                    return redirect()->route('projects');
                }
            }

            /**
             * Check owner of Invoice
             */
            if($request->route('invoice')) 
            {
                $owner = \App\Invoice::find($request->route('invoice')->id);
                
                if($user_id != $owner->customer->user->id)
                {
                    return redirect()->route('invoices');
                }
            }

            /**
             * Check owner of Quote
             */
            if($request->route('quote'))
            {
                $owner = \App\Quote::find($request->route('quote')->id);

                if($user_id != $owner->customer->user->id)
                {
                    return redirect()->route('quotes');
                }
            }
            
            /**
             * Check owner of Customer
             */
            if($request->route('customer'))
            {
                if($user_id != $request->route('customer')->user_id){
                    return redirect()->route('customers');
                }
            }
        }
        return $next($request);
    }
}
