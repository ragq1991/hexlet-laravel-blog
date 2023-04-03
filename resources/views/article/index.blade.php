<!-- BEGIN (write your solution here) -->
@extends('layouts.app')
@section('header')
    <h1>Статьи</h1>
@endsection
@section('content')
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2>{{ $article->name }}</h2>
        <div>{{ Str::limit($article->body, 200) }}</div>
    @endforeach
    {{ $articles->links() }}
@endsection
<!-- END -->
