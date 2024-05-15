<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isActive
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
        if(auth()->user()->status == 0)
        {
            $request->session()->flush();
            return redirect()->route('login')->with('error','Akun anda sementara tidak aktif.');
        }
        return $next($request);
    }
}
