<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Import Log facade


class checkIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        
        if (!$user) {
            return redirect('/login'); // Redirect if not authenticated
        }

        Log::info('Authenticated user name: ' . $user->name);

        if ($user->email !== 'test@example.com') {
            return redirect('/dashboard'); // Redirect to dashboard if role is not admin
        }

        return $next($request);
    }
}
