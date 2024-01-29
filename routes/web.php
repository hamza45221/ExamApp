<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


Route::middleware(['auth', 'role:admin'])->group(function () {


    Route::get('/department_create',[\App\Http\Controllers\DepartmentController::class,'create'])->name('create.department');
    Route::post('/department_store',[\App\Http\Controllers\DepartmentController::class,'store'])->name('store.department');


    Route::get('/subject_create',[\App\Http\Controllers\SubjectController::class,'create'])->name('create.subject');
    Route::post('/subject_store',[\App\Http\Controllers\SubjectController::class,'store'])->name('store.subject');


    Route::get('/paper_create',[\App\Http\Controllers\PaperController::class,'create'])->name('create.paper');
    Route::post('/paper_store',[\App\Http\Controllers\PaperController::class,'store'])->name('store.paper');

    Route::get('/question_create',[\App\Http\Controllers\QuestionController::class,'create'])->name('create.question');
    Route::post('/question_store',[\App\Http\Controllers\QuestionController::class,'store'])->name('store.question');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/choose', [\App\Http\Controllers\AnswerController::class, 'choose'])->name('choose.paper');
    Route::get('/answer', [\App\Http\Controllers\AnswerController::class, 'answer'])->name('answers.answer');
    Route::post('/store/question', [\App\Http\Controllers\AnswerController::class, 'storeQuestion'])->name('store.qestion');
//});





