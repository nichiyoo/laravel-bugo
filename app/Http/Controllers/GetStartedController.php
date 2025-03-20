<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class GetStartedController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $articles = Article::simplePaginate(5);
    return view('get-started.index', [
      'articles' => $articles
    ]);
  }

  /**
   * Display the specified resource.
   */
  public function show($slug)
  {
    $article = Article::where('slug', $slug)->first();
    if (!$article) abort(404);

    $previous = Article::where('id', '<', $article->id)->orderBy('id', 'desc')->first();
    $next = Article::where('id', '>', $article->id)->orderBy('id', 'asc')->first();

    return view('get-started.show', [
      'article' => $article,
      'previous' => $previous,
      'next' => $next
    ]);
  }
}
