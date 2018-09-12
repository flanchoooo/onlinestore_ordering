<?php

namespace App\Http\Middleware;

use App\PlatformTrace;
use Closure;
use Illuminate\Support\Facades\Log;

class PlatformTraces
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        return $next($request);
    }

    public function terminate($request, $response){
        Log::info('requests', [
            'request'  => $request->except('password', 'pin', 'otp'),
            'response' => $response,
        ]);
        PlatformTrace::create([
            'action'          => $request->getPathInfo(),
            'request'         => json_encode($request->except('password', 'pin', 'otp')),
            'response'        => $response->content(),
            'request_address' => $request->getUri(),
            'client_ip'       => $request->getClientIp(),
        ]);
    }
}
