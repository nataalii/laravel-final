<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;



Route::redirect('/', '/login');

// Login
Route::view('/login', 'sessions.login')->name('login')->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store')->middleware('guest');

// Registration
Route::view('register', 'register.create')->name('register.create')->middleware('guest');
Route::post('register', [RegistrationController::class, 'store'])->name('register.store')->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

// user 
Route::group([ 'middleware' => 'auth'], function () {
	Route::get('/home', [QuizController::class, 'allQuizz'])->name('home');

	// Quizzes crud
    Route::get('/quizes', [QuizController::class, 'index'])->name('quiz');
	Route::get('quizes/create', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/quizes', [QuizController::class, 'store'])->name('quiz.store');
	
	Route::get('quizes/{quiz:id}/edit', [QuizController::class, 'edit'])->name('quiz.edit');
	Route::patch('quizes/{quiz:id}', [QuizController::class, 'update'])->name('quiz.update');
	Route::delete('quizes/{quiz:id}', [QuizController::class, 'destroy'])->name('quiz.delete');

	// Questions crud
	Route::get('question/create', [QuestionController::class, 'create'])->name('question.create');
	Route::get('question', [QuestionController::class, 'index'])->name('question.index');
	Route::post('question', [QuestionController::class, 'store'])->name('question.store');

	Route::get('question/{question:id}/edit', [QuestionController::class, 'edit'])->name('question.edit');
	Route::patch('question/{question:id}/edit', [QuestionController::class, 'update'])->name('question.update');
	Route::delete('question/{question:id}', [QuestionController::class, 'destroy'])->name('question.delete');

	//Publish quiz by Admin
    Route::get('/pending', [QuizController::class, 'pending'])->name('quiz.pending');
	Route::post('/quizzes/{quiz:id}/publish', [QuizController::class, 'publish'])->name('quiz.publish');
	
	// Start quiz
	Route::get('quiz/{quiz:id}/start', [QuizController::class, 'start'])->name('quiz.start');
	Route::get('quiz/{quiz:id}/question', [QuizController::class, 'showQuestions'])->name('question');
	Route::get('quiz/{quiz:id}/end', [QuizController::class, 'end'])->name('quiz.end');


});


