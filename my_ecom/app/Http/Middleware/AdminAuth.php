<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('ADMIN_LOGIN')) {
        } else {
            //folosim flash pentru a semnaliza o eroare la introducerea datelor
            $request->session()->flash('error', 'Access Denied');
            //Functia redirect o folosim pentru a ne trimite catre pagina dorita
            return redirect('admin');
        }

        return $next($request);
    }
}
