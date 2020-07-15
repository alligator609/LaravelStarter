<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionMiddleware
{
  
    public function handle($request, Closure $next)
    {
        if ( ! check_user_permissions($request)) {
            abort(403, "Forbidden access!");
           }
       return $next($request);
    }
}
