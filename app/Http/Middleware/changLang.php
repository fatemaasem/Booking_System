<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
class changLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(session()->has('lang')&&session()->get('lang')=='en'){
            App::setLocale('en');
        }
        else if(session()->has('lang')&&session()->get('lang')=='ar'){
            App::setLocale('ar');
        }
      
        
        return $next($request);
    }
}
