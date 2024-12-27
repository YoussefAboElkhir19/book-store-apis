<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $whocanaccess): Response


    {
        // $user_abilities = auth()->user()->currentAccessToken()->abilities;

        // dd($whocanaccess);
        // abilities of user by login 
        $user_abilities = Auth::user()->roles;
        // dd($match);
        // dd($user_abilities);

        // convert roles from string to array
        $route_abilites = explode('|', $whocanaccess);
        //***** */ compare between to array
        $match = array_intersect(
            // array contain roles of user by login 3la 7sam role bta3 user
            $user_abilities,
            // array contain roles 3la 7sab role bta3t function
            $route_abilites

        );
        // dd($match);
        if (count($match) === 0) {

            throw new \Exception('You Are NOt Acceess To Do It !!!!!');
        }
        return $next($request);
    }
}
