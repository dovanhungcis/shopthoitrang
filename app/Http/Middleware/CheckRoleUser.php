<?php
namespace App\Http\Middleware;

use Closure;
use Sentinel;

class CheckRoleUser {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user = Sentinel::getUser();
        if (isset($user) && (Sentinel::getUser()->roles()->first()->slug == 'user' || Sentinel::getUser()->roles()->first()->slug == 'admin'))
            return $next($request);

        return redirect(url('/register'));
    }
}

