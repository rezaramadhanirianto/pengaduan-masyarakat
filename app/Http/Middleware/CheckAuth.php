<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckAuth
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
        
        if(Auth::user()->level != 'user'){
            if(Auth::user()->verifikasi == '0' ){
                return back()->with('failed', 'Anda tidak memiliki akss terhadap menu ini');
            }
        }
        return $next($request);
    }
}
