<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth; 

use Closure;

class AuthPharmacy
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
            if (false == Auth::guard('pharmacy')->check()) {
                return redirect()->route('pharmacy.login');
                // dd('hhhhhh');
            }
            return $next($request);
        }
}
