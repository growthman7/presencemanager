<?php

use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\EvenementsController;
use \App\Http\Controllers\ListeController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home');
})->name('home');

//admin routes
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/admin/evenements', [EvenementsController::class, 'index'])->name('admin.evenements')->middleware('auth');

Route::get('/admin/evenements/{id}', [EvenementsController::class, 'show'])->name('admin.evenements.show')->middleware('auth');


//
Route::get('/evenements/create', function () {
    return view('listes.create');
})->name('liste.create');

Route::post('/evenements', [EvenementsController::class, 'store'])->name('evenement.store');

Route::get('/evenements/{id}', function ($id) {
    $evenement = \App\Models\Evenements::findOrFail($id);
    return view('listes.show', compact('evenement'));
})->name('evenement.show');

Route::post('/listes', [ListeController::class, 'store'])->name('liste.store');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
