<?php

namespace tsc\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Redirect;

class Informer
{
       protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }
        else {
            if($this->auth->user()->typ_use==2)
            {
                 Redirect::to('notify');
            }
            else {
                
                Redirect::to('auth/logout');

        }

        return $next($request);
    }
}
