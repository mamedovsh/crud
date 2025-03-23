<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Log;

class NewsObserver
{
    public function hidden(News $news)
    {
        Log::info("News hidden {$news->id}");
    }
}
