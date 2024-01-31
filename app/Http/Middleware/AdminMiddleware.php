<?php

namespace App\Http\Middleware;

use Closure;
class AdminMiddleware
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
        

         if (!$request->session()->exists('admin_id')) {
            return redirect(route("admin"));
        } else {
            return $next($request);
        }
       
    }
}
