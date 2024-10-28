<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckGuest
{

    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            return response()->json(['message' => 'You are already logged in.']);
        }
        return $next($request);
    }
}
