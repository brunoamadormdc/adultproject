<?php

namespace App\Http\Middleware;

use Closure;

class checkloginusuario
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
        
        if(request()->session()->get('emailusuario') && request()->session()->get('id_usuario')) {
           
            return $next($request);
        }
        
        return redirect()->route('loginusuario')->with('error','Sua sessão expirou');
       
    }
}
