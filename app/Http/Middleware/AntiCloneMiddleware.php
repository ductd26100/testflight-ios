<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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
        'Go-http-client',
        'axios',
        'node-fetch',
        'Postman',
        'Insomnia',
        'httpie',
        'aria2',
        'Wget',
        'Curl',
        'LinkChecker',
        'SiteSucker',
        'pavuk',
        'CopyBot',
        'EmailCollector',
        'WebAuto',
        'NetMechanic',
        'Xaldon',
        'Zeus',
    ];

    /**
     * Suspicious patterns
     */
    protected $suspiciousPatterns = [
        '/bot/i',
        '/spider/i',
        '/crawl/i',
        '/fetch/i',
        '/scrape/i',
        '/mirror/i',
        '/archive/i',
        '/copy/i',
        '/download/i',
    ];

    /**
     * Rate limit: max requests per minute per IP
     */
    protected $maxRequestsPerMinute = 60;

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $userAgent = $request->header('User-Agent') ?? '';
        $ip = $request->ip();
        $path = $request->path();

        // 1. Check for blocked user agents
        foreach ($this->blockedAgents as $agent) {
            if (stripos($userAgent, $agent) !== false) {
                Log::warning("Blocked clone attempt", ['ip' => $ip, 'ua' => $userAgent]);
                return $this->blockResponse();
            }
        }

        // 2. Check for suspicious patterns
        foreach ($this->suspiciousPatterns as $pattern) {
            if (preg_match($pattern, $userAgent)) {
                Log::warning("Suspicious UA pattern", ['ip' => $ip, 'ua' => $userAgent]);
                return $this->blockResponse();
            }
        }

        // 3. Check for empty user agent (automated tools)
        if (empty($userAgent) && !$request->ajax() && !$request->is('api/*')) {
            return $this->blockResponse();
        }

        // 4. Rate limiting per IP
        $cacheKey = 'rate_limit_' . md5($ip);
        $requests = Cache::get($cacheKey, 0);

        if ($requests >= $this->maxRequestsPerMinute) {
            Log::warning("Rate limit exceeded", ['ip' => $ip]);
            return response('Too Many Requests', 429);
        }

        Cache::put($cacheKey, $requests + 1, 60); // 60 seconds

        // 5. Check for rapid sequential requests (scraping behavior)
        $lastRequestKey = 'last_request_' . md5($ip);
        $lastRequest = Cache::get($lastRequestKey, 0);
        $now = microtime(true);

        if ($lastRequest && ($now - $lastRequest) < 0.1) { // Less than 100ms between requests
            $rapidKey = 'rapid_count_' . md5($ip);
            $rapidCount = Cache::increment($rapidKey);
            Cache::put($rapidKey, $rapidCount, 300); // 5 minutes

            if ($rapidCount > 20) { // More than 20 rapid requests
                Log::warning("Scraping behavior detected", ['ip' => $ip]);
                return $this->blockResponse();
            }
        }
        Cache::put($lastRequestKey, $now, 60);

        // 6. Check for too many static asset requests (clone behavior)
        if (preg_match('/\.(css|js|html)$/i', $path)) {
            $assetKey = 'asset_requests_' . md5($ip);
            $assetRequests = Cache::increment($assetKey);
            Cache::put($assetKey, $assetRequests, 60);

            if ($assetRequests > 100) { // Too many asset requests
                Log::warning("Excessive asset requests", ['ip' => $ip]);
                return $this->blockResponse();
            }
        }

        // Process request
        $response = $next($request);

        // Add security headers
        if (method_exists($response, 'header')) {
            $response->header('X-Frame-Options', 'SAMEORIGIN');
            $response->header('X-Content-Type-Options', 'nosniff');
            $response->header('X-XSS-Protection', '1; mode=block');
            $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');
            $response->header('Content-Security-Policy', "frame-ancestors 'self'");
            $response->header('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

            // Anti-cache for HTML (makes cloning harder)
            if ($request->is('/') || preg_match('/\.html$/i', $path)) {
                $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
                $response->header('Pragma', 'no-cache');
                $response->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
            }
        }

        return $response;
    }

    /**
     * Return block response
     */
    protected function blockResponse()
    {
        return response()->view('errors.403', [], 403);
    }
}
