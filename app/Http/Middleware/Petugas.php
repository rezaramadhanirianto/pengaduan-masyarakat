<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Petugas
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
        if(Auth::user()->level != 'petugas'){
            return back()->with('failed', 'Anda tidak memiliki akses terhadap menu ini');
        }
        return $next($request);
    }
}
