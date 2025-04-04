<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $articles = Article::paginate(5);

    return view('articles.index', [
      'articles' => $articles
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('articles.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreArticleRequest $request)
  {
    $article = Article::create($request->validated());
    $request->session()->flash('success', 'Article created successfully.');
    return redirect()->route('articles.index', $article);
  }

  /**
   * Display the specified resource.
   */
  public function show(Article $article)
  {
    return view('article', [
      'article' => $article
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Article $article)
  {
    return view('articles.edit', [
      'article' => $article
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateArticleRequest $request, Article $article)
  {
    $article->update($request->validated());
    $request->session()->flash('success', 'Article updated successfully.');
    return redirect()->route('articles.index', $article);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, Article $article)
  {
    $article->delete();
    $request->session()->flash('success', 'Article deleted successfully.');
    return redirect()->route('articles.index');
  }
}
