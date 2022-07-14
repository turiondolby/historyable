<?php

use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    $user = User::find(1);
//
//    $user->update([
//        'name' => Str::random(10),
//        'password' => bcrypt('cats')
//    ]);

    $article = Article::find(1);

    $article->update([
        'body' => 'pew pew'
    ]);
});

Route::get('users/{user}/history', function (User $user) {
    return view('users.history', [
        'histories' => $user->history
    ]);
});

Route::get('articles/{article}/history', function (Article $article) {
    return view('users.history', [
        'histories' => $article->history
    ]);
});
