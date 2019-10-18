<?php

namespace App\Http\Middleware;

use Closure;

class SslMiddleware
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
          if(in_array(env('APP_ENV'),json_decode(env('SSL_UPGRADE_ENV'),true))){
            \URL::forceScheme('https');
          }
          return $next($request);
    }
}
