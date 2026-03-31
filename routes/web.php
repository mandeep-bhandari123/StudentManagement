<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('teachers',function (){
//     return Teacher::all();
// });

Route::get('teachers', [TeacherController::class,'index']);

Route::get('add-teacher', [TeacherController::class,'add']);

Route::get('show-teacher/{id}',[ TeacherController::class,'show']);

Route::get('update-teacher/{id}',[ TeacherController::class,'update']);

Route::get('delete-teacher/{id}',[ TeacherController::class,'delete']);

