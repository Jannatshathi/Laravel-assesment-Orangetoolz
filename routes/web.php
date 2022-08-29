<?php

use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [TaskListController::class, 'index'])->name('index');
Route::get('/create', [TaskListController::class, 'create'])->name('list.create');
Route::get('/list-update/{id}', [TaskListController::class, 'listUpdate'])->name('list.update');
Route::get('/inprogress-update/{id}', [TaskListController::class, 'progressUpdate'])->name('progress.update');
Route::get('/done-list/{id}', [TaskListController::class, 'doneUpdate'])->name('done.update');
