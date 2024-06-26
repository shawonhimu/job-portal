<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JWTTokenAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        $result = JWTToken::VerifyToken($token);
        if ('unauthorized' == $result || null == $result) {
            return redirect('candidate-login');

        } else {

            $request->headers->set('email', $result->userEmail);
            $request->headers->set('id', $result->userID);
            // $request->headers->set('employ_email', $result->employEmail);
            // $request->headers->set('employ_id', $result->employID);
            // $request->headers->set('com_id', $result->companyID);
            return $next($request);
        }
    }
}
