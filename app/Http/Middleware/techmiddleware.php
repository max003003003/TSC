<?php

namespace tsc\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Redirect;
use Closure;

class techmiddleware
{
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


            if($this->auth->user()->typ_use==3)
            {
                 
               return $next($request);
            }
            
        }
       return new RedirectResponse(url('auth/logout'));

    }
}
