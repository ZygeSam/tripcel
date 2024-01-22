<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyPaystackSignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->getMethod() !== 'POST' || !$request->hasHeader('X-Paystack-Signature')) {
            abort(403, 'Invalid request');
        }

        $payload = $request->getContent();
        $secretKey = config('payment.paystack.paystack_secret_key');

        if ($request->header('X-Paystack-Signature') !== hash_hmac('sha512', $payload, $secretKey)) {
            abort(403, 'Invalid Paystack signature');
        }

        return $next($request);
    }
}
