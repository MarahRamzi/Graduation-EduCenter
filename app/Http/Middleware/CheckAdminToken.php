<?php

namespace App\Http\Middleware;

use App\Http\traits\MyTrait;
use Closure;
use Lcobucci\JWT\Exception;
use Illuminate\Http\Request;
use Throwable;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
//use JWTAuth;

class CheckAdminToken
{
    use MyTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
           // $request->merge(['user' => $user]);
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                // return response()->json(['success' => false, 'msg'=>'INVALID_TOKEN'],200);
                return $this->returnError(3000,'INVALID_TOKEN');
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                // return response()->json(['success' => false, 'msg'=>'EXPIRED_TOKEN'],200);
                return $this->returnError(3000,'EXPIRED_TOKEN');
            }else{
        //  return response()->json(['success' => false, 'msg'=>'TOKEN_NOTFOUND'],200);
        return $this->returnError(3000,'TOKEN_NOTFOUND');
            }
        }
        catch(Throwable $e){
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                // return response()->json(['success' => false, 'msg'=>'INVALID_TOKEN'],200);
                return $this->returnError(3000,'INVALID_TOKEN');

            }
            else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                // return response()->json(['success' => false, 'msg'=>'EXPIRED_TOKEN'],200);
                return $this->returnError(3000,'EXPIRED_TOKEN');
            }else{
                // return response()->json(['success' => false, 'msg'=>'TOKEN_NOTFOUND'],200);
                return $this->returnError(3000,'TOKEN_NOTFOUND');
                   }

        }
        if(!$user)
        // return response()->json(['sucess'=>false, 'msg'=>trans('Unauthenticated')]);
        return $this->returnError(3000,'Unauthenticated');
        return $next($request);
    }
}
