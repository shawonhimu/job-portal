<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('emptoken');
        $result = JWTToken::VerifyToken($token);
        if ('unauthorized' == $result || null == $result) {
            return redirect('employee-login');

        } else {
            $request->headers->set('emp_email', $result->employEmail);
            $request->headers->set('emp_id', $result->employID);
            $request->headers->set('com_id', $result->companyID);
            return $next($request);
        }
    }
}
