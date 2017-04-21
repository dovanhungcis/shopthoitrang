<?php
namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class CheckRoleAdmin {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Sentinel::getUser()->inRole('admin')) {
            return $next($request);
        }

        return redirect()->route('admin@getLogin')->with('err', 'Bạn không có quyền truy cập');
    }
}
