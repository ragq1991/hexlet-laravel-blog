<?php

use App\Http\Controllers\Articles;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [Home::class, 'index']);
Route::get('about', function(){
    return view('about');
});
Route::get('articles', [Articles::class, 'index'])
  ->name('articles.index');

Route::get('articles/{id}', [Articles::class, 'show'])
->name('articles.show');
