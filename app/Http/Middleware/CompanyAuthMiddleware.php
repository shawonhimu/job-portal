<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('cmptoken');
        $result = JWTToken::VerifyToken($token);
        if ('unauthorized' == $result || null == $result) {
            return redirect('company-login');

        } else {
            $request->headers->set('com_email', $result->companyEmail);
            $request->headers->set('com_id', $result->companyID);
            return $next($request);
        }
    }
}
