<?php
namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class Authenticate {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Sentinel::check()) {
            return $next($request);
        }

        return redirect()->route('admin@getLogin')->withErrors('You must login');
    }
}
