<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AntiCloneMiddleware
{
    /**
     * Blocked User Agents (website copier tools)
     */
    protected $blockedAgents = [
        'HTTrack',
        'WebCopier',
        'WebZIP',
        'Teleport',
        'Offline Explorer',
        'wget',
        'curl',
        'libwww',
        'Scrapy',
        'python-requests',
        'Java',
        'HttpClient',
        'Grabber',
        'Download Demon',
        'WebReaper',
        'SiteSnagger',
        'WebStripper',
        'GetRight',
        'Mass Downloader',
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $userAgent = $request->header('User-Agent') ?? '';

        // Check for blocked user agents
        foreach ($this->blockedAgents as $agent) {
            if (stripos($userAgent, $agent) !== false) {
                abort(403, 'Access Denied');
            }
        }

        // Check for empty user agent (automated tools often have empty UA)
        if (empty($userAgent) && !$request->ajax()) {
            abort(403, 'Access Denied');
        }

        // Add security headers
        $response = $next($request);

        if (method_exists($response, 'header')) {
            $response->header('X-Frame-Options', 'SAMEORIGIN');
            $response->header('X-Content-Type-Options', 'nosniff');
            $response->header('X-XSS-Protection', '1; mode=block');
            $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');
        }

        return $response;
    }
}
