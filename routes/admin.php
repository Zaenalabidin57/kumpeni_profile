<?php

use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostTagController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocmedController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class,'index'])->name('dashboard');
Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
Route::post('/profile',[ProfileController::class,'update'])->name('profile.update');
Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change-password.index');
Route::post('/change-password',[ChangePasswordController::class,'update'])->name('change-password.update');

// users
Route::get('users/data',[UserController::class,'data'])->name('users.data');
Route::resource('users',UserController::class)->except('show');
Route::post('users/change-status',[UserController::class,'changeStatus'])->name('users.change-status');

// post category
Route::get('post-categories/data',[PostCategoryController::class,'data'])->name('post-categories.data');
Route::resource('post-categories',PostCategoryController::class)->except('create','show','edit','update');

// post tag
Route::get('post-tags/data',[PostTagController::class,'data'])->name('post-tags.data');
Route::resource('post-tags',PostTagController::class)->except('create','show','edit','update');

// roles
Route::get('roles/data',[RoleController::class,'data'])->name('roles.data');
Route::post('roles/get',[RoleController::class,'get'])->name('roles.get');
Route::DELETE('roles/remove-permission',[RoleController::class,'removePermission'])->name('roles.remove-permission');
Route::post('roles/add-permission',[RoleController::class,'addPermission'])->name('roles.add-permission');
Route::resource('roles',RoleController::class)->except('create','show','edit','update');

// permissions
Route::get('permissions/data',[PermissionController::class,'data'])->name('permissions.data');
Route::post('permissions/get',[PermissionController::class,'get'])->name('permissions.get');
Route::post('permissions/getByRole',[PermissionController::class,'getByRole'])->name('permissions.getByRole');
Route::resource('permissions',PermissionController::class)->except('create','show','edit','update');

// posts
Route::get('posts/data',[PostController::class,'data'])->name('posts.data');
Route::resource('posts',PostController::class);
Route::post('posts/change-status',[PostController::class,'changeStatus'])->name('posts.change-status');


// filemanager
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// socmed
Route::get('socmeds/data',[SocmedController::class,'data'])->name('socmeds.data');
Route::resource('socmeds',SocmedController::class)->except('create','show','edit','update');

// setting
Route::get('setting',[SettingController::class,'index'])->name('settings.index');

Route::post('setting',[SettingController::class,'update'])->name('settings.update');
