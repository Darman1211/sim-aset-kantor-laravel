<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        // jika user belum login atau user tersebut bukan darmanyaman
        // auth()->guest() bisa juga penulisan seperti ini untuk guest = kalau guest(kalau user belum login nilai nya true) sdngkan check kebalikannya kalau user sudah login bernilai true sebab itu harus pakai ! diawalnya
        if(!auth()->check() || !auth()->user()->is_admin) {
            // 403 = forbidden
            abort(403);
        }
        return $next($request);
    }
}
