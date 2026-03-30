<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->attributes->get('user');

        if (!$user || $user->role !== 'admin') {
            return response()->json(['message' => 'Nincs jogosultság az admin felülethez.'], 403);
        }

        return $next($request);
    }
}
