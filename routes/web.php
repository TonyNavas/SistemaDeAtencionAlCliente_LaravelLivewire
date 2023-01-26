<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Livewire\ProductComponent;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CategoryComponent;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;

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


Auth::routes();
// Home routes
Route::get('/', WelcomeController::class)->name('inicio');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Contact routes
Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');

// Product routes
Route::get('platillos/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/menu', MenuController::class)->name('menu');
Route::get('menu/{product}', [ProductController::class, 'show'])->name('products.show');

//Messages routes
Route::get('mensajes', [MessageController::class, 'index'])->name('message.index');

// Notifications routes
Route::post('messages', [MessageController::class,'store'])->name('messages.store');
Route::get('messages/{message}',[ MessageController::class,'show'])->name('messages.show');

// Admin routes
Route::group(['middleware' => ['auth']], function(){
    Route::resource('/admin/roles', RolController::class)->middleware('can:ver-roles');
    Route::resource('/admin/usuarios', UserController::class)->middleware('can:ver-usuarios');
    Route::get('admin/categories', CategoryComponent::class)->name('categories.index')->middleware('can:ver-categorias');
    Route::get('admin/products', ProductComponent::class)->name('products.index')->middleware('can:ver-products');
});

