<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
  /** @use HasFactory<\Database\Factories\ArticleFactory> */
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<string, mixed>
   */
  protected $fillable = [
    'title',
    'description',
    'video_url',
    'source_url',
    'source_title'
  ];

  /**
   * @override
   * Override the default boot method to add the slug attribute.
   *
   * @return void
   */
  protected static function boot(): void
  {
    parent::boot();
    static::creating(function (Article $article) {
      $article->slug = Str::slug($article->title);
    });
  }
}
