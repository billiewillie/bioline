<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;

    class Cors
    {
        /**
         * Handle an incoming request.
         *
         * @param \Illuminate\Http\Request $request
         * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
         * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
         */
        public function handle($request, Closure $next)
        {
            $domain = parse_url($_SERVER['HTTP_REFERER']);
            $host = '*';
            if (isset($domain['host'])) {
                $host = $domain['host'];
            }
            return $next($request)
                ->header('Access-Control-Allow-Origin', $host)
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
        }
    }
