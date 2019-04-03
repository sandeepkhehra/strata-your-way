<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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

		// if ($user->type === 1) {
		// 	return redirect('user-area');
		// }

		if (is_null($user->community)) {
			return redirect('/community');
		}

		return $next($request);
    }
}
