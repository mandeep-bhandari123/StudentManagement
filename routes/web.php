<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('student')->controller(StudentController::class)->group(function () {
  Route::get('/', 'index');
  Route::view('add','students.add');
  Route::post('create','create');
  Route::get("edit/{id}",'edit');
  Route::post("update/{id}", "update");
  Route::delete('delete/{id}', "destroy");
  });



// Route::get('teachers',function (){
//     return Teacher::all();
// });
// Route::get('add-data',[StudentController::class,'addData']);

// Route ::get('get-data',[StudentController::class, 'getData']);

// Route ::get('update-data',[StudentController::class, 'updateData']);

// Route ::get('detete-data',[StudentController::class, 'deleteData']);

// Route ::get('query-scope',[StudentController::class, 'queryScope']);


