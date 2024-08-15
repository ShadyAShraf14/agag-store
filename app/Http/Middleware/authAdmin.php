<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class authAdmin
{

    public function handle(Request $request, Closure $next): Response
    {
        if(auth::user()->user_type == 'admin'){
            return $next($request);
        }else{
            session()->flush();
            return redirect()->route('login');
        }
    }
}
