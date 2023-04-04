<!-- BEGIN (write your solution here) -->
@extends('layouts.app')
@section('header')
    <h1>Статьи</h1>
@endsection
@section('content')

    @if (Session::has('flash_message'))
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="alert alert-success">
                        {{Session::get('flash_message')}}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2>{{ $article->name }}</h2>
        <div>{{ Str::limit($article->body, 200) }}</div>
        <a href="{{ route('articles.edit', $article->id) }}">edit</a>
        <a href="{{ route('articles.destroy', $article->id) }}" data-method="delete" rel="nofollow">Удалить</a>
    @endforeach
    <div>{{ $articles->links() }}</div>
@endsection
<!-- END -->
