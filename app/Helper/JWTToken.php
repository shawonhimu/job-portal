<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function CreateToken($userEmail, $userID)
    {
        $key = env('JWT_KEY');
        date_default_timezone_set('Asia/Dhaka');

        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 3600 * 24 * 7,
            'userEmail' => $userEmail,
            'userID' => $userID,
         ];

        // return $payload;
        // return $key;
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function CreateCompanyToken($companyEmail, $companyID)
    {
        $key = env('JWT_KEY');
        date_default_timezone_set('Asia/Dhaka');

        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 3600 * 24 * 7,
            'companyEmail' => $companyEmail,
            'companyID' => $companyID,
         ];

        // return $payload;
        // return $key;
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function CreateCompanyEmployeeToken($employEmail, $employID, $companyID)
    {
        $key = env('JWT_KEY');
        date_default_timezone_set('Asia/Dhaka');

        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 3600 * 24 * 7,
            'employEmail' => $employEmail,
            'employID' => $employID,
            'companyID' => $companyID,
         ];

        // return $payload;
        // return $key;
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function VerifyToken($token)
    {
        try {
            if (null == $token) {
                return 'unauthorized';
            } else {
                $key = env('JWT_KEY');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return $decoded;
            }

        } catch (Exception $e) {
            return 'unauthorized';
        }
    }
}
