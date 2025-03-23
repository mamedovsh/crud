<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\NewsHiddenEvent; 
use App\Listeners\NewsHiddenListener;
use App\Observers\NewsObserver;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        NewsHiddenEvent::class => [
            NewsHiddenListener::class,
        ],
    ];

    public function boot()
    {
        News::observe(NewsObserver::class);
    }
    
}