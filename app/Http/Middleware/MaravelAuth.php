<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class MaravelAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
        $response = $next($request);

        if (Auth::guard($guard)->check())
        {
            $route = $request->method().' '.$request->path();

            if (Gate::denies('maravel-auth', $route))
            {

                return abort(403, 'Unauthorized action.');
            }
        }

        return $response;
    }
}
