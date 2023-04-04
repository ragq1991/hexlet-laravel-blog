<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function store(Request $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|max:1000',
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
}
