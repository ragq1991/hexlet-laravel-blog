<!-- BEGIN (write your solution here) -->
@extends('layouts.app')
@section('header')
    <h1>О блоге</h1>
@endsection
@section('content')
    <p>Эксперименты с Ларавелем на Хекслете</p>
    <table>
    @foreach($articles as $article)
    <tr>
        <td>Title: {{ $article->name }}</td>
        <td>Body: {{ $article->body }}</td>
    </tr>
    @endforeach
@endsection
<!-- END -->
