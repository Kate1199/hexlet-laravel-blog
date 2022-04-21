<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();

        return view('article.create', compact('article'));
    }


    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $article = new Article();
        $article->fill($data);
        $article->save();

        Session::flash('flash_message', 'Страница добавлена');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(StorePostRequest $request, $id)
    {
        $data = $request->validated();

        $article = Article::findOrFail($id);
        $article->fill($data);
        $article->save();

        Session::flash('flash_message', 'Статья успешно обновлена');
    }
}
