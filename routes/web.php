<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/bugo', fn() => view('bugo'))->name('bugo');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/profile', fn() => view('profile'))->middleware(['auth'])->name('profile');

Route::get('/start', function () {
  $articles = Article::all();
  return view('start', ['articles' => $articles]);
})->name('start');

Route::get('/dashboard', function () {
  $articles = Article::all();
  return view('dashboard', ['articles' => $articles]);
})
  ->middleware(['auth', 'role:admin'])
  ->name('dashboard');

Route::get('/start/{slug}', function ($slug) {
  $article = Article::where('slug', $slug)->first();
  if (!$article) abort(404);

  $previous = Article::where('id', '<', $article->id)->orderBy('id', 'desc')->first();
  $next = Article::where('id', '>', $article->id)->orderBy('id', 'asc')->first();

  return view('article', [
    'article' => $article,
    'previous' => $previous,
    'next' => $next
  ]);
})->name('article');


Route::resource('articles', ArticleController::class)
  ->middleware(['auth', 'role:admin'])
  ->names('articles');

require __DIR__ . '/auth.php';
