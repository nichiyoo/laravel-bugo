<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BugoController;
use App\Http\Controllers\GetStartedController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/bugo', fn() => view('bugo'))->name('bugo');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/profile', fn() => view('profile'))->middleware(['auth'])->name('profile');
Route::get('/dashboard', fn() => redirect()->route('articles.index'))->name('dashboard');

Route::resource('articles', ArticleController::class)
  ->middleware(['auth', 'role:admin'])
  ->names('articles');

Route::get('/get-started', [GetStartedController::class, 'index'])->name('get-started.index');
Route::get('/get-started/{slug}', [GetStartedController::class, 'show'])->name('get-started.show');

Route::get('/bugo', [BugoController::class, 'index'])->name('bugo.index');
Route::get('/bugo/form', [BugoController::class, 'start'])->name('bugo.start');
Route::post('/bugo/form', [BugoController::class, 'next'])->name('bugo.next');
Route::get('/bugo/previous', [BugoController::class, 'previous'])->name('bugo.previous');
Route::get('/bugo/finish', [BugoController::class, 'finish'])->name('bugo.finish');
Route::get('/bugo/reset', [BugoController::class, 'reset'])->name('bugo.reset');
Route::post('/bugo/history', [BugoController::class, 'save'])->name('bugo.save')->middleware('auth');
Route::get('/bugo/history', [BugoController::class, 'history'])->name('bugo.history')->middleware('auth');

require __DIR__ . '/auth.php';
