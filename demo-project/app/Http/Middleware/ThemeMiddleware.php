<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ThemeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('sec-ch-ua') && strpos($request->header('sec-ch-ua'), 'Google') !== false) {
            $isDarkMode = $request->hasHeader('sec-ch-ua') && strpos($request->header('sec-ch-ua'), 'dark') !== false;
        } else {
            $isDarkMode = $request->hasHeader('sec-ch-ua') && strpos($request->header('sec-ch-ua'), 'light') === false;
        }

        $request->attributes->set('isDarkMode', $isDarkMode);

        return $next($request);
    }
}
