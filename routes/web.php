<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Les routes de gestion du panier
Route::get('cart', "CartController@show")->name('cart.show');
Route::post('cart/add/{product}', "CartController@add")->name('cart.add');
Route::get('cart/remove/{product}', "CartController@remove")->name('cart.remove');
Route::get('cart/empty', "CartController@empty")->name('cart.empty');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])
    ->name('articles.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::resource('articles', AdminArticleController::class);
           

    });


});

require __DIR__.'/auth.php';
