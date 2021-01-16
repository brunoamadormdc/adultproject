<?php

namespace App\Http\Middleware;

use Closure;

class checkrestrict
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
       if(request()->session()->get('emailrestrict') && request()->session()->get('id_restrict')) {
           
            return $next($request);
        }
    
        return redirect()->route('loginrestrict')->with('error','Sua sessão expirou');
    }
}
