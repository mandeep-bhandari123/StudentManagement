<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/aboutus", function () {
    $name = "tester";
    $email="tester@email.com";
    #return view('aboutus')->with('name', $name)->with('email', $email);      -----> Method 1 of sending data to frontend
    #return view("aboutus", compact("name","email")); #-------> Method 2 of sending data to frontend (view)
    return view('aboutus', ['name'=>$name, 'email'=>$email]); #------------>Method 3 of sending data
});

## GROUPING ROUTES
Route::prefix("details")->group(function(){
    Route::get('/students', function(){
        return "This is students detail";
    }) -> name("student-Detail");
    Route::get('/teacher', function(){
        return "This is teacher detail";
    }) -> name("teacher-Detail");
} );


#PATH PARAM IN LARAVEL
Route::get('student/{id}/{reg}', function($id, $reg){
    return 'Student number '.$id." Regestration ".$reg;
});

Route::fallback(function(){
    return "Page is not fount";
});


# DIRECTLY CALLING VIEW

Route::view("contact-us","contactus", ["name"=>"Mandeep", "email"=> "mandeep@gmail.com  "]);

#Calling controller
Route::controller(StudentController::class)->group(function(){
    Route::get("students",'index');
    Route::get("about-us/{id}/{name}",'aboutUs');
});