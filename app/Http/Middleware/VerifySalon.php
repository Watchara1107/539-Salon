<?php

namespace App\Http\Middleware;

use App\Models\Salon;
use Closure;
use Illuminate\Http\Request;

class VerifySalon
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
        if(Salon::all()->status == 0){
            return redirect()->route('salon.index');
        }
        return $next($request);
    }
}
