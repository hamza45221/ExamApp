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


//Route::middleware(['auth', 'role:admin'])->group(function () {
////
////    Route::get('/department_create',[\App\Http\Controllers\DepartmentController::class,'create'])->name('create.department');
////    Route::post('/department_store',[\App\Http\Controllers\DepartmentController::class,'store'])->name('store.department');
////
////    Route::get('/subject_create',[\App\Http\Controllers\SubjectController::class,'create'])->name('create.subject');
////    Route::post('/subject_store',[\App\Http\Controllers\SubjectController::class,'store'])->name('store.subject');
////
////    Route::get('/paper_create',[\App\Http\Controllers\PaperController::class,'create'])->name('create.paper');
////    Route::post('/paper_store',[\App\Http\Controllers\PaperController::class,'store'])->name('store.paper');
////
////    Route::get('/showForm',[\App\Http\Controllers\QuestionController::class,'create'])->name('create.question');
////    Route::any('/storeQuestion',[\App\Http\Controllers\QuestionController::class,'storeQuestion'])->name('store.question');
//
//});

Route::group(['prefix' => 'teacher'], function() {
    Route::group(['middleware' => 'teacher.guest'], function(){
        Route::view('/login','teacher.login')->name('teacher.login');
        Route::post('/login',[\App\Http\Controllers\TeacherController::class, 'authenticate'])->name('teacher.auth');
    });

    Route::group(['middleware' => 'teacher.auth'], function(){
        Route::get('/dashboard',[\App\Http\Controllers\TeacherController::class, 'dashboard'])->name('teacher.dashboard');

        Route::get('logout',[\App\Http\Controllers\TeacherController::class,'logout'])->name('teacher.logout');

        Route::get('/department_create',[\App\Http\Controllers\DepartmentController::class,'create'])->name('create.department');
        Route::post('/department_store',[\App\Http\Controllers\DepartmentController::class,'store'])->name('store.department');

        Route::get('/subject_create',[\App\Http\Controllers\SubjectController::class,'create'])->name('create.subject');
        Route::post('/subject_store',[\App\Http\Controllers\SubjectController::class,'store'])->name('store.subject');

        Route::get('/paper_create',[\App\Http\Controllers\PaperController::class,'create'])->name('create.paper');
        Route::post('/paper_store',[\App\Http\Controllers\PaperController::class,'store'])->name('store.paper');

        Route::get('/showForm',[\App\Http\Controllers\QuestionController::class,'create'])->name('create.question');
        Route::any('/storeQuestion',[\App\Http\Controllers\QuestionController::class,'storeQuestion'])->name('store.question');

    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/student/choose', [\App\Http\Controllers\StudentController::class, 'selectSubject'])->name('student.selectSubject');
Route::any ('/question/view', [\App\Http\Controllers\StudentController::class, 'question_view'])->name('question.view');


Route::any('/answer/store', [\App\Http\Controllers\AnswerController::class, 'answer_store'])->name('answers.store');
Route::get('/teacher/answer', [\App\Http\Controllers\TeacherController::class, 'teacher_answer'])->name('teacher.answers');

