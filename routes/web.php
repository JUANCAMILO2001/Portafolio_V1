<?php

use Illuminate\Support\Facades\Route;
//Rutas de usuario
use App\Http\Controllers\User\IndexController;
//Rutas de ADMIN
use App\Http\Controllers\Admin\User\UsersController;
use App\Http\Controllers\Admin\Socialnetworks\SocialnetworksController;
use App\Http\Controllers\Admin\Aboutme\AboutmesController;
use App\Http\Controllers\Admin\Education\EducationController;
use App\Http\Controllers\Admin\Experience\ExperiencesController;
use App\Http\Controllers\Admin\Workigskill\WorkingskillsController;
use App\Http\Controllers\Admin\Knowledge\KnowledgesController;
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
    Route::resource('admin/aboutmes', AboutmesController::class)->names('admin.aboutmes');
    Route::resource('admin/educations', EducationController::class)->names('admin.educations');
    Route::resource('admin/experiences', ExperiencesController::class)->names('admin.experiences');
    Route::resource('admin/workingskills', WorkingskillsController::class)->names('admin.workingskills');
    Route::resource('admin/knowledges', KnowledgesController::class)->names('admin.knowledges');
});
