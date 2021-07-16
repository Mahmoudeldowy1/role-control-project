<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Login And Logout
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/logout',  [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

//Routes For admin Panel
Route::middleware('auth')->group(function () {

    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.index');

    //Routes For Users
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
    Route::get('/admin/users/create',[UserController::class,'create'])->name('users.create');
    Route::post('/admin/users',[UserController::class,'store'])->name('users.store');
    Route::get('/admin/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::patch('/admin/users/{user}',[UserController::class,'update'])->name('users.update');
    Route::delete('/admin/users/{user}/destroy',[UserController::class,'destroy'])->name('users.destroy');

    //Routes For Permissions
    Route::get('/admin/permissions',[PermissionController::class,'index'])->name('permissions.index');
    Route::get('/admin/permissions/create',[PermissionController::class,'create'])->name('permissions.create');
    Route::post('/admin/permissions',[PermissionController::class,'store'])->name('permissions.store');
    Route::get('/admin/permissions/{permission}/edit',[PermissionController::class,'edit'])->name('permissions.edit');
    Route::patch('/admin/permissions/{permission}',[PermissionController::class,'update'])->name('permissions.update');
    Route::delete('/admin/permissions/{permission}/destroy',[PermissionController::class,'destroy'])->name('permissions.destroy');


    //Routes For Roles
    Route::get('/admin/roles',[RoleController::class,'index'])->name('roles.index');
    Route::get('/admin/roles/create',[RoleController::class,'create'])->name('roles.create');
    Route::post('/admin/roles',[RoleController::class,'store'])->name('roles.store');
    Route::get('/admin/roles/{role}/edit',[RoleController::class,'edit'])->name('roles.edit');
    Route::patch('/admin/roles/{role}',[RoleController::class,'update'])->name('roles.update');
    Route::delete('/admin/roles/{role}/destroy',[RoleController::class,'destroy'])->name('roles.destroy');


});
