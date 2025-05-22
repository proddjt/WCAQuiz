<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', [QuizController::class, 'home'])->name('home');
Route::get('/person', [QuizController::class, 'person'])->name('quiz.person');
