<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/resume', 'resume');
Route::view('/contact', 'contact');

Route::controller(SkillController::class)->group(function () {
    Route::get('/skills', 'index');
    Route::get('/skill/add', 'add')->middleware(['auth']);
    Route::post('/skill', 'store');
    Route::get('/skill/{skill}', 'details');
    Route::get('/skill/{skill}/edit', 'edit')->middleware(['auth']);
    Route::patch('/skill/{skill}', 'update');
    Route::delete('/skill/{skill}', 'destroy');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
