<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Club;
use App\User;
use Illuminate\Support\Facades\Gate;

class TeacherMiddleware
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
        return $next($request);
    }
}
