<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\EventController;
use \App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PlayerController;
//authentification 

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;



Route::get('/', [EventController::class, 'showEvents'])->name('welcome');

Route::get('players', [PlayerController::class, 'index'])->name('players.index');

Route::middleware(AdminMiddleware::class)->group(function (){

Route::get('/admin/events', [EventController::class,'index'])->name('events.index');
Route::get('/admin/create', [EventController::class,'create'])->name('events.create');
Route::post('/admin/events', [EventController::class,'store'])->name('events.store');

Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::get('/events/{id}', [EventController::class, 'showOneEvent'])->name('events.show');

});


Route::get('/hello', [HelloController::class,'index']
);









Route::get('register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');




    // Routes pour le profil utilisateur
Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

// Routes pour l'admin


Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
});