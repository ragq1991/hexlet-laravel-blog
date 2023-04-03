<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class Articles extends Controller
{
    function index() {
        $listOfArticles = Article::all();

        foreach($listOfArticles as $key=>$article){
            if ($article->name === ''){
                $listOfArticles->forget($key);
            }
        }
        $sorted = $listOfArticles->sortByDesc(function ($article, int $key) {
            print_r($article['id'] . '<br>');
            return $article['id'];
        });
        return view('about', ['articles'=>$sorted]);
    }
}
