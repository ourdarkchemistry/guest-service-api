<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DebugHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $start = microtime(true);

        $response = $next($request);

        // подсчёт времени выполнения и памяти
        $executionTime = (microtime(true) - $start) * 1000; // в миллисекундах
        $memoryUsage = memory_get_peak_usage(true) / 1024; // в КБ

        // добавление заголовков
        $response->headers->set('X-Debug-Time', number_format($executionTime, 2) . ' ms');
        $response->headers->set('X-Debug-Memory', number_format($memoryUsage, 2) . ' KB');

        return $response;
    }
}
