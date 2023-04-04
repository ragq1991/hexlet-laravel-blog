<?php

use App\Http\Controllers\Articles;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;


Route::get('/', [Home::class, 'index']);

Route::get('about', function(){
    return view('about');
});
Route::delete('articles/{id}', [Articles::class, 'destroy'])
    ->name('articles.destroy');

Route::get('articles', [Articles::class, 'index'])
    ->name('articles.index');

Route::get('articles/create', [Articles::class, 'create'])
    ->name('articles.create');

Route::get('articles/{id}/edit', [Articles::class, 'edit'])
    ->name('articles.edit');

Route::get('articles/{id}', [Articles::class, 'show'])
    ->name('articles.show');

Route::post('articles', [Articles::class, 'store'])
    ->name('articles.store');

Route::patch('articles/{id}', [Articles::class, 'update'])
    ->name('articles.update');


