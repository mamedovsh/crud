<?php
class Kernel{
protected $routeMiddleware = [
    // Другие middleware
    'datalogger' => \App\Http\Middleware\DataLogger::class,
];
}