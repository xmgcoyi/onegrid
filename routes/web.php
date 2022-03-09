<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsValid;
use \App\Http\Controllers\PostController;
use App\Http\Controllers\RatingController;

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
    return view('welcome');
});


Route::controller(PostController::class)
    ->middleware([EnsureUserIsValid::class, 'auth'])
    ->group(function () {

        Route::get('/post/create', 'create')
            ->withoutMiddleware([EnsureUserIsValid::class])
            ->name('post.create');

        Route::post('/post/create', 'store')
            ->withoutMiddleware([EnsureUserIsValid::class])
            ->name('post.store');

        Route::get('/posts', 'index')->name('post.index')
            ->withoutMiddleware([EnsureUserIsValid::class, 'auth']);;

        Route::get('/post/{post}', 'show')->name('post.show')
            ->withoutMiddleware([EnsureUserIsValid::class, 'auth']);

        Route::get('/post/edit/{post}', 'edit')
            ->name('post.edit');

        Route::post('/post/edit/{post}', 'update')
            ->name('post.update');

        Route::get('/post/delete/{post}', 'delete')
            ->name('post.delete');

});


Route::post('/rating/capture/{post}', [RatingController::class, 'capture'])
    ->name('rating.capture');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
