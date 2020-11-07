<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        
        return view('articles.index', ['articles' => $articles]);
    }
}
