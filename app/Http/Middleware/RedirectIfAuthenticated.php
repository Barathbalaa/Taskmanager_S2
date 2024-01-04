<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if(Auth::guard($guard)->check()){
                $id=Auth::guard($guard)->id();
                $u_type=User::Where('id',$id)->get('usertype')->first();
                $u_type=$u_type->usertype;
                if($u_type=='admin'){
                    return redirect()->intended(route('admin_index'));
                }
                return redirect()->intended(route('indexemp'));
            }
        }

        return $next($request);
    }
}
