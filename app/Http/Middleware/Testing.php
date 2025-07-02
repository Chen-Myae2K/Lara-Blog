<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Testing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $accpetUsers = [1,5,8,11];
        if( !in_array(Auth::id(), $accpetUsers) === false )
        {
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
