<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectWwwToNonWww
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();

        if (str_starts_with(strtolower($host), 'www.')) {
            $newUrl = preg_replace('/^(https?:\/\/)www\./i', '$1', $request->fullUrl());

            return redirect()->to($newUrl, 301);
        }

        return $next($request);
    }
}
