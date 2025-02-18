<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Basic ')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $encodedCredentials = substr($authHeader, 6);
        $decodedCredentials = base64_decode($encodedCredentials);
        [$username, $password] = explode(':', $decodedCredentials, 2);
        $expectedUsername = env('UZUM_USERNAME');
        $expectedPassword = env('UZUM_PASSWORD');
        return response()->json(['error' => 'Unauthorized'.$username.$password.$expectedUsername.$expectedPassword], 401);

        if ($username != $expectedUsername || $password != $expectedPassword) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
