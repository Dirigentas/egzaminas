<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $middlewareRoles = explode('|', $roles);
        $middlewareRoles = array_map(fn($r) => User::ROLES[$r], $middlewareRoles);
        
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('home');
        }

        if (in_array($user->role, $middlewareRoles)) {
            return $next($request);
        }
        
        abort(401);
    }
}

?>