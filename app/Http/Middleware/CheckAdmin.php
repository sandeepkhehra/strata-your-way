<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdminController;

class CheckAdmin
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
		$user = Auth::user();

		if ($user->email !== 'contact@stratayourway.com.au' && $user->type === 0 && is_null($user->community)) {
			return redirect()->route('community.create');
		}

		return $next($request);
    }
}
