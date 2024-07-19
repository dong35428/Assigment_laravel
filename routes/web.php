<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::get('/', function () {
    return view('client.index');
});

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.index');
        })->name('index');

        Route::prefix('posts')
            ->name('posts.')
            ->group(function () {
                Route::get('/', [PostController::class, 'index'])
                    ->name('index');
                Route::get('/create', [PostController::class, 'create'])
                    ->name('create');
                Route::post('/store', [PostController::class, 'store'])
                    ->name('store');
                Route::get('/show/{post}', [PostController::class, 'show'])
                    ->name('show');
                Route::get('/edit/{post}', [PostController::class, 'edit'])
                    ->name('edit');
                Route::put('/update/{post}', [PostController::class, 'update'])
                    ->name('update');
                Route::delete('/delete/{post}', [PostController::class, 'destroy'])
                    ->name('destroy');
                Route::get('/seach', [PostController::class, 'seach'])
                ->name('seach');
            });

        Route::prefix('categories')
        ->name('categories.')
        ->group(function () {
            Route::get('/', [CategoryController::class, 'index'])
                ->name('index');
            Route::get('/create', [CategoryController::class, 'create'])
                ->name('create');
            Route::post('/store', [CategoryController::class,'store'])
                ->name('store');
            Route::get('/show/{category}', [CategoryController::class,'show'])
                ->name('show');
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])
                ->name('edit');
            Route::put('/update/{category}', [CategoryController::class, 'update'])
                ->name('update');
            Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])
                ->name('destroy');
        });
    });
