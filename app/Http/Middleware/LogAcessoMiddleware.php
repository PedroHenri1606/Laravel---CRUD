<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Sera executado aqui as manipualações das requisições conforme necessidade
        //return $next($request); 

        //Sera executado aqui a resposta das requisições conforme necessidade
        

        $ip = $request->server->get("REMOTE_ADDR");
        $rote = $request->getRequestUri();
        LogAcesso::create(['log' => "$ip requisitou a rota $rote"]);
        return $next($request);
    }
}
