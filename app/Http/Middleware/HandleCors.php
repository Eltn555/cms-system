<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleCors
{
/**
* Handle an incoming request.
*
* @param \Illuminate\Http\Request $request
* @param \Closure $next
* @return mixed
*/
public function handle(Request $request, Closure $next)
{
$response = $next($request);

// Add Cross-Origin headers for SharedArrayBuffer usage
$response->header('Cross-Origin-Opener-Policy', 'same-origin');
$response->header('Cross-Origin-Embedder-Policy', 'require-corp');

return $response;
}
}
