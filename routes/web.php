<?php

use App\Http\Controllers\ProfileController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/bugo', fn() => view('bugo'))->name('bugo');
Route::get('/about', fn() => view('about'))->name('about');

Route::get('/start', function () {
  $articles = Article::all();
  return view('start', ['articles' => $articles]);
})->name('start');

Route::get('/start/{slug}', function ($slug) {
  $article = Article::where('slug', $slug)->first();
  if (!$article) abort(404);
  return view('article', ['article' => $article]);
})->name('article');

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
