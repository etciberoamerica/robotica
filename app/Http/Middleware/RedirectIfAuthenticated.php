<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use  Log;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {

            $rol_id = Auth::user()->role_id;

            switch($rol_id){
                case 1:
                    return redirect('/dashboard');
                    break;
                case 2:
                    return redirect('/profile');
                    break;
                case 3:
                    return redirect('/profile');
                    break;
                case 4:
                    return redirect('/profile');
                    break;
                case 5:
                    return redirect('/profile');
                    break;
                case 6:
                    return redirect('/profile');
                    break;
                case 7:
                    return redirect('/profile');
                    break;
                case 8:
                    return redirect('/profile');
                    break;
                case 9:
                    return redirect('/profile/referee');
                    break;
            }




        }

        return $next($request);
    }
}
