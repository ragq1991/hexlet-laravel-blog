<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ArticlePostRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(2);
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticlePostRequest $request)
    {
        $data = $request->validated();
        $data2 = $this->validate($request, [
            'name' => 'required|unique:articles',
        ]);
        $data = array_replace($data, $data2);

        $article = new Article();
        $article->fill($data);
        $article->save();

        Session::flash('flash_message', 'Элемент добавлен');

        // Редирект на указанный маршрут
        return redirect()
            ->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticlePostRequest $request, Article $article)
    {
        $data = $request->validated();
        $data2 = $this->validate($request, [
            'name' => 'required|unique:articles,name,' . $article->id,
        ]);
        $data = array_replace($data, $data2);

        $article->fill($data);
        $article->save();
        Session::flash('flash_message', 'Элемент изменен');
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article) {
            $article->delete();
            Session::flash('flash_message', 'Элемент удален');
        }
        return redirect()->route('articles.index');
    }
}
