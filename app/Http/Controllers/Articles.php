<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlePostRequest;


class Articles extends Controller
{
    function index() {
        $articles = Article::paginate(2);
        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        // Передаем в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(ArticlePostRequest $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы
        $data = $request->validated();
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
        ]);

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($data);
        // При ошибках сохранения возникнет исключение
        $article->save();

        $request->session()->flash('flash_message', 'Элемент добавлен');

        // Редирект на указанный маршрут
        return redirect()
            ->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(ArticlePostRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validated();
        $data = $this->validate($request, [
            // У обновления немного измененная валидация. В проверку уникальности добавляется название поля и id текущего объекта
            // Если этого не сделать, Laravel будет ругаться на то что имя уже существует
            'name' => 'required|unique:articles,name,' . $article->id,
        ]);

        $article->fill($data);
        $article->save();
        $request->session()->flash('flash_message', 'Элемент изменен');
        return redirect()
            ->route('articles.index');
    }
}
