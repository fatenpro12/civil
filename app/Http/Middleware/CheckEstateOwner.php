<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEstateOwner
{
    /**
     * Checks if the request is by customer, if not then 404.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->user_type_log !='ESTATE_OWNER') {
            abort(404);
        }

        return $next($request);
    }
}
