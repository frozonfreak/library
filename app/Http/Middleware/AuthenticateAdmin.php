<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAdmin
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
        if($this->auth->guest() && $this->auth->user()->hasRole('admin')){
            return $next($request);    
        }
        return response('Unauthorized.', 401);
    }
}
