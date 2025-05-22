<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', [QuizController::class, 'home'])->name('home');
Route::post('/person', [QuizController::class, 'person'])->name('quiz.person');
Route::get('/start', [QuizController::class, 'start'])->name('quiz.start');
