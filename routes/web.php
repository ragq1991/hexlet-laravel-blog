<?php

use App\Http\Controllers\Articles;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;


Route::get('/', [Home::class, 'index']);

Route::get('about', function(){
    return view('about');
});

Route::get('articles', [Articles::class, 'index'])
    ->name('articles.index');

Route::get('articles/create', [Articles::class, 'create'])
    ->name('articles.create');

Route::get('articles/{id}', [Articles::class, 'show'])
    ->name('articles.show');

Route::post('articles', [Articles::class, 'store'])
    ->name('articles.store');
