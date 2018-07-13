<?php

namespace App\Http\Middleware;

use Closure;
use app\User;

class CheckUser
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
        $id = 1;
       
        if ($id == auth()->user()->id)
        {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
