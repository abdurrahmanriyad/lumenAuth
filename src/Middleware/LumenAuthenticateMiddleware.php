<?php
namespace Abdurrahmanriyad\LumenAuth\Middleware;

use Closure;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;

class LumenAuthenticateMiddleware {

    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        if (!$token) {
            // Unauthorized response if token not there
            return response()->json([
                'error' => 'Token not provided.'
            ], 401);
        }

        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch (ExpiredException $e) {
            return response()->json([
                'error' => 'Provided token is expired.'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error while decoding token.'
            ], 400);
        }

        $user = null;
        if (env('USER_MODEL')) {
            if (class_exists(env('USER_MODEL'))) {
                $user = env('USER_MODEL')::find($credentials->sub);
            }
        }

        app('auth')->viaRequest('api', function ($request)  use ($user){
            return $user;
        });
        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;
        return $next($request);
    }
}