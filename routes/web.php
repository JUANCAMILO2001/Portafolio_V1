<?php

use Illuminate\Support\Facades\Route;
//Rutas de usuario
use App\Http\Controllers\User\IndexController;
//Rutas de ADMIN
use App\Http\Controllers\Admin\User\UsersController;
use App\Http\Controllers\Admin\Socialnetworks\SocialnetworksController;
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

Route::get('/', [IndexController::class, 'index'])->name('user.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');
    // Deshabilitar la ruta de registro
    Route::match(['get', 'post', 'put', 'delete'], '/register', function () {
        abort(404);
    })->name('register');

    //Rutas admin
    //Rutas admin Usuario
    Route::resource('admin/users', UsersController::class)->names('admin.users');
    Route::resource('admin/socialnetworks', SocialnetworksController::class)->names('admin.socialnetworks');
});
