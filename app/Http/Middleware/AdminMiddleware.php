<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\JsonResponse;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse|BinaryFileResponse|JsonResponse
    {
        $user = $request->user();
        if ($user && $user->is_admin === 1) { // Assurez-vous que la colonne dans votre base de données est nommée correctement
            return $next($request);
        }
        return redirect()->route('welcome')->with('error', 'Vous n\'avez pas accès à cette page.');
    }
}

