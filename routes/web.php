<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Livewire\ProductComponent;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CategoryComponent;
use App\Http\Controllers\MessageController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Notifications
Route::post('messages', [MessageController::class,'store'])->name('messages.store');
Route::get('messages/{message}',[ MessageController::class,'show'])->name('messages.show');



Route::group(['middleware' => ['auth']], function(){
    Route::resource('/admin/roles', RolController::class)->middleware('can:ver-roles');
    Route::resource('/admin/usuarios', UserController::class)->middleware('can:ver-usuarios');

    Route::get('admin/categories', CategoryComponent::class)->middleware('can:ver-categories');
    Route::get('admin/products', ProductComponent::class);
});

