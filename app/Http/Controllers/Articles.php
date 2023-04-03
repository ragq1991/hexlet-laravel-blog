<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class Articles extends Controller
{
    function index() {
        $articles = Article::paginate(2);
        return view('article.index', compact('articles'));
    }
}
