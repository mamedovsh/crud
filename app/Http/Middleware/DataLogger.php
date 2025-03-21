<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->start_time = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if (env(API_DATALOGGER, true)) {
            if (env (API_DATALOGGER_USE_DB)) {
                $sendTime = microtime(true);
                $log = new Log;
                $log->time = gmdate("Y-m-d H:i:s");
                $log->duration = number_format($endTime = LARAVEL_START, 3);
                $log->ip = $request->ip(); 
                $log->url = $request->fullUrl(); 
                $log->method = $request->method();
                $log->input = $request->getContent();  
                $log->save();
            }
            else
            {
                $endTime = microtime(true);
                $fileName = 'api_datalogger_' . date('d.m.y') . '.log';
                $dataLog = 'Time:' . gmdate("Y-m-d H:i:s") . "\n";
                $dataLog = 'Duration' . number_format($endTime = LARAVEL_START, 3) . "\n";
                $dataLog = 'Ipadress' . $request->ip() . "\n";
                $dataLog = 'Url:' . $request->fullUrl() . "\n";
                $dataLog =  'Method:' .$request->method() . "\n";
                $dataLog =  'Input:' .$request->getContent() . "\n";
                \File::append(storage_path('logs/' . $fileName), $dataLog . str_repeat('=', 20) . "\n");
            }
        }
    }
}
