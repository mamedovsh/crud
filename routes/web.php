<?php

use App\Models\Log;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Events\NewsHidden;


Route::middleware(['datalogger'])->group(function () {
    Route::get('/logs', function () {
        $logs = Log::all();
        return view('logs', compact('logs'));
    });
});
// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::post('/users', [UserController::class, 'store']);
// Route::get('/resume/{id}', [PdfGeneratorController::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/logs', function () {
    $news = new News();

    $news->title = 'Test news title';
    $news->body = 'Test news body';

    $news->save();
    return $news;
});

Route::get('/news/{id}/hide', function ($id) {
    $news = News::findOrFail($id);
    $news->is_hidden = true;
    $news->save();

    NewsHidden::dispatch($news);

    return response()->json(['message' => 'News hidden successfully!']);
});
Route::get('/news/create-test', function () {
    $news = News::create([
        'title' => 'Test News Title',
        'content' => 'This is the content of the test news.',
        'is_hidden' => false,
    ]);

    return response()->json($news);
});