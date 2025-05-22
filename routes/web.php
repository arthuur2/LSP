<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::get('/create', function () {
    return view('create');
});
Route::post('/store', [TaskController::class, 'store']);
Route::post('/update/{id}', [TaskController::class, 'update']);
Route::post('/delete/{id}', [TaskController::class, 'delete']);
