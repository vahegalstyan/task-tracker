<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::get('/tasks',[TaskController::class,'index'])->name('tasks.index');
Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
