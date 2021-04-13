<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ADMIN_LOGGED
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if (session_id() == '') {
                @session_start();
            }
            if(Auth::check()){
                $objectUser = Auth::user();
                $user = array(
                    "id"      => $objectUser->id,
                    "name"    => $objectUser->name,
                    "email"   => $objectUser->email,
                    "role_id" => $objectUser->role_id
                );
                $_SESSION['user'] = $user;
            }

            return $next($request);
        }

        return redirect()->route('ADMIN_LOGIN');
    }
}
