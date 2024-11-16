<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DebugMiddleware
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        $response = $next($request, $response);

        $endTime = microtime(true);
        $endMemory = memory_get_usage();

        // добавляем заголовки для времени и памяти
        $response = $response
            ->withHeader('X-Debug-Time', (int)(($endTime - $startTime) * 1000))
            ->withHeader('X-Debug-Memory', (int)(($endMemory - $startMemory) / 1024));

        return $response;
    }
}
