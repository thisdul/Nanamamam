<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // buat kondisi, jika user terautentikasi dan user yg login ini roles nya = Admin, maka redirect ke request selanjutnya
        if(Auth::user() && Auth::user()->roles == 'ADMIN')
        {
            return $next($request);
        }
        // sebaliknya jika yg login itu roles nya == USER maka akan diaragkan ke halmaan utama.
        return redirect('/');

    }
}
