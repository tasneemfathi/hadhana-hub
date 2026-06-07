<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Resolve the active locale from the session (set by the language switcher)
     * and fall back to the app default. Drives both translations and RTL/LTR.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supported = config('app.supported_locales', ['ar', 'en']);
        $locale = session('locale', config('app.locale', 'ar'));

        if (! in_array($locale, $supported, true)) {
            $locale = config('app.fallback_locale', 'en');
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
