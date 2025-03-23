<?php
namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class NewsHiddenListener
{

    /**
     * Обработать событие.
     *
     * @param  \App\Events\NewsHiddenEvent  $event
     * @return void
     */
    public function handle(NewsHiddenEvent $event)
    {
        Log::info('News ' . $event->news->id . ' hidden');
    }
}
