<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class Articles extends Controller
{
    function index() {
        $listOfArticles = Article::all();
        return view('about', ['articles'=>$listOfArticles]);
    }
}
