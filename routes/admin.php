<?php

use App\Http\Controllers\Admin\{
    AuthController,
    HomeController,
    Acl\RoleController,
    Acl\ModuleController,
    Acl\ResourceController,
    UserController,
};

use Illuminate\Support\Facades\Route;

/*** without auth ***/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('auth');
Route::get('/forget-password', [AuthController::class, 'request'])->name('password.request');

/*** auth is required ***/
Route::group(['middleware' => ['auth']], function() {

    // Route::middleware(['auth:web', 'access.control.list'])->group(function () {
    Route::middleware(['auth:web'])->group(function () {

        /*** roles ***/
        Route::get('roles',                  [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/new',              [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles/store',           [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/{id}/edit',        [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/{id}/update',      [RoleController::class, 'update'])->name('roles.update');
        Route::get('roles/{id}/destroy',     [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::get('roles/{role}/resources', [RoleController::class, 'syncResources'])->name('roles.resources');
        Route::put('roles/{role}/resources', [RoleController::class, 'updateSyncResources'])->name('roles.resources.update');

        /*** modules ***/
        Route::get('modules',                [ModuleController::class, 'index'])->name('modules.index');
        Route::get('modules/new',            [ModuleController::class, 'create'])->name('modules.create');
        Route::post('modules/store',         [ModuleController::class, 'store'])->name('modules.store');
        Route::get('modules/{id}/edit',      [ModuleController::class, 'edit'])->name('modules.edit');
        Route::put('modules/{id}/update',    [ModuleController::class, 'update'])->name('modules.update');
        Route::get('modules/{id}/destroy',   [ModuleController::class, 'destroy'])->name('modules.destroy');

        Route::get('modules/{module}/resources', [ModuleController::class, 'syncResources'])->name('modules.resources');
        Route::put('modules/{module}/resources', [ModuleController::class, 'updateSyncResources'])->name('modules.resources.update');

        /*** resources ***/
        Route::get('resources',                [ResourceController::class, 'index'])->name('resources.index');
        Route::get('resources/new',            [ResourceController::class, 'create'])->name('resources.create');
        Route::post('resources/store',         [ResourceController::class, 'store'])->name('resources.store');
        Route::get('resources/{id}/edit',      [ResourceController::class, 'edit'])->name('resources.edit');
        Route::put('resources/{id}/update',    [ResourceController::class, 'update'])->name('resources.update');
        Route::get('resources/{id}/destroy',   [ResourceController::class, 'destroy'])->name('resources.destroy');

        /*** users ***/
        Route::resource('users', UserController::class);

    });

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
