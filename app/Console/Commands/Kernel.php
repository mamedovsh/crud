<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class kernel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kernel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 
    }
    protected $routeMiddleware = [
        // Другие middleware
        'datalogger' => \App\Http\Middleware\DataLogger::class,
    ];

    protected function shedule(Shedule $shedule)
    {
        $shedule->job(ClearCache::class)->hourly();
    }
}
