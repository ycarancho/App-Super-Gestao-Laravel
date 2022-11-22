<?php

namespace App\Http\Middleware;
use App\LogAcesso;
use Closure;

class LogAcessoMiddleware
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
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=>"IP -> $ip ,acessou a rota -> $rota'"]);
        $retorno =  $next($request);
        $retorno->setStatusCode(201,'Alterei o status da requisição ');
        return $retorno;
    }
}
