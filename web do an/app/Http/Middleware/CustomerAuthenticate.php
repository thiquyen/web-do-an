<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomerAuthenticate
{
    private $cus;
    public function __construct(){
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = 'cus')
    {
        if(!Auth::guard($guard)->check()){
            return redirect()->route('home.login')->with('error','Bạn cần đăng nhập');
        }elseif(Auth::guard('cus')->user()->status == 0){
            Auth::guard($guard)->logout();
            return redirect()->route('home.login')->with('error','Bạn cần xác nhận tài khoản');
        }
        return $next($request);
       
    }
}
