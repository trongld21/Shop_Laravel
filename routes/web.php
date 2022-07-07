<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
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
    return view('welcome');
});

Route::get('/admin/user/login', [LoginController::class, 'login'])->name('login');

Route::post('/admin/user/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/home', [MainController::class, 'index'])->name('admin');

        #Menu
        Route::prefix('/menus')->group(function () {
            Route::get('/add', [MenuController::class, 'create']);
            Route::post('/add', [MenuController::class, 'store']);
            Route::get('/list', [MenuController::class, 'index']);
            Route::DELETE('/destroy', [MenuController::class, 'destroy']);
            Route::get('/edit/{menu}', [MenuController::class, 'show']);
            Route::post('/edit/{menu}', [MenuController::class, 'update']);
        });
    });
});