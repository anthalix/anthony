<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        // Vérifie que l’utilisateur est connecté et qu’il a le rôle ROLE_ADMIN
        if (!$user || $user->role !== 'ROLE_ADMIN') {
            return response()->json([
                'success' => false,
                'message' => 'Accès refusé : vous devez être administrateur.'
            ], 403);
        }

        return $next($request);
    }
}
