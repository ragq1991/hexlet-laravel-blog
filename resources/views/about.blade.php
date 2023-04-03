<!-- BEGIN (write your solution here) -->
@extends('layouts.app')
@section('header')
    <h1>О блоге</h1>
@endsection
@section('content')
    <p>Эксперименты с Ларавелем на Хекслете</p>
    @foreach($articles as $article)
    <p>Title: {{ $article->name }}</p>
    <p>Body: {{ $article->body }}</p>
    @endforeach
@endsection
<!-- END -->
