<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

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



Route::get('/', [QuizController::class, 'index']);
Route::get('add-question', [QuizController::class, 'addQuestion']);
Route::post('add-question', [QuizController::class, 'saveQuestion']);
Route::get('edit-question/{id}', [QuizController::class, 'editQuestion']);
Route::post('update-question', [QuizController::class, 'updateQuestion']);
Route::get('delete-question/{id}', [QuizController::class, 'deleteQuestion']);
Route::get('view-question/{id}', [QuizController::class, 'viewQuestion']);
