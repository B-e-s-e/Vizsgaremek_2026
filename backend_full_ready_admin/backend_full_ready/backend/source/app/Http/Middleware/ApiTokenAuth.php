<?php

namespace App\Http\Middleware;

use App\Models\Felhasznalo;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken() ?: $request->header('X-API-TOKEN');
        if (!$token) {
            return response()->json(['message' => 'Nincs hitelesítési token.'], 401);
        }
        $user = Felhasznalo::where('api_token', $token)->first();
        if (!$user) {
            return response()->json(['message' => 'Érvénytelen token.'], 401);
        }
        $request->attributes->set('user', $user);
        return $next($request);
    }
}
