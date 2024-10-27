<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckGuest
{

    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            return redirect()->route('index');
        }
        return $next($request);
    }
}
