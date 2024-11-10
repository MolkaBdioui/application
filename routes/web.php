<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/accounts', [AdminController::class, 'accounts'])->name('accounts');
Route::get('/accounts/new', [AdminController::class, 'add'])->name('accounts.add');
Route::post('/accounts/save', [AdminController::class, 'save'])->name('accounts.save');
Route::get('/accounts/{id}/detail', [AdminController::class, 'detail'])->name('accounts.detail');
Route::get('/accounts/{id}/delete', [AdminController::class, 'delete'])->name('accounts.delete');
Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
Route::get('/projects/add', [AdminController::class, 'addProject'])->name('projects.add');
Route::post('/projects/save', [AdminController::class, 'saveProject'])->name('projects.save');
Route::get('/tasks', [AdminController::class, 'tasks'])->name('tasks');