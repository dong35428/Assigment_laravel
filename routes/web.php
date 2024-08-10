<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShowController;
use App\Http\Middleware\IsAdmin;

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

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerPost'])->name('registerPost');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//client
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/show/{post}', [ShowController::class, 'show'])->name('show');
Route::get('/danhmuc/{category}', [ShowController::class, 'danhmuc'])->name('danhmuc');
Route::get('/tag/{tag}',[ShowController::class, 'tag'])->name('tag');

//quên mật khẩu
Route::get('forgot',[AuthController::class, 'forgot'])->name('forgot');
Route::get('forgot',[AuthController::class, 'forgotPassword'])->name('forgotPassword');


Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', IsAdmin::class])
    ->group(function () {

        Route::get('/', function () {
            return view('admin.index');
        })->name('index');

        Route::prefix('posts')
            ->as('posts.')
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
            ->as('categories.')
            ->group(function () {
                Route::get('/', [CategoryController::class, 'index'])
                    ->name('index');
                Route::get('/create', [CategoryController::class, 'create'])
                    ->name('create');
                Route::post('/store', [CategoryController::class, 'store'])
                    ->name('store');
                Route::get('/show/{category}', [CategoryController::class, 'show'])
                    ->name('show');
                Route::get('/edit/{category}', [CategoryController::class, 'edit'])
                    ->name('edit');
                Route::put('/update/{category}', [CategoryController::class, 'update'])
                    ->name('update');
                Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])
                    ->name('destroy');
            });
        Route::prefix('tags')
            ->as('tags.')
            ->group(function () {
                Route::get('/', [TagController::class, 'index'])
                    ->name('index');
                Route::get('/create', [TagController::class, 'create'])
                    ->name('create');
                Route::post('/store', [TagController::class, 'store'])
                    ->name('store');
                Route::get('/show/{tag}', [TagController::class, 'show'])
                    ->name('show');
                Route::get('/edit/{tag}', [TagController::class, 'edit'])
                    ->name('edit');
                Route::put('/update/{tag}', [TagController::class, 'update'])
                    ->name('update');
                Route::delete('/delete/{tag}', [TagController::class, 'destroy'])
                    ->name('destroy');
            });
        Route::prefix('users')
            ->as('users.')
            ->group(function () {
                Route::get('/', [UserController::class, 'index'])
                    ->name('index');
                Route::get('/edit/{user}', [UserController::class, 'edit'])
                    ->name('edit');
                Route::put('/update/{user}', [UserController::class, 'update'])
                    ->name('update');
                Route::delete('/delete/{user}', [UserController::class, 'destroy'])
                    ->name('destroy');
            });
    });
