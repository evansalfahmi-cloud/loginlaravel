<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user', 'category')->latest()->take(6)->get();
        return view('blog', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::with('user', 'category')->findOrFail($id);
        return view('blog-detail', compact('article'));
    }
}
