<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function Laravel\Prompts\table;

class StudentController extends Controller
{
  public function addData()
  {
    $item = new Student();
    $item->name = 'Tester 2.0';
    $item->email = 'tester2@gmail.com';
    $item->age = 34;
    $item->date_of_birth = '2020-01-20';
    $item->gender = 'f';
    $item->save();
  }
  public function getData(){
    $items = Student::select('id','name')
    // ->find(55);
    ->where('id','=','58')
    ->first();
    return $items;
  }
  public function updateData(){
    $item = Student::where('id','=','58')->first();
    $item ->name = 'Updated Student';
    $item -> age = 34;
    $item->save();
    return "updated";
  }
  public function deleteData(){
    // $item = Student::where("id","=","52")->first();
    // $item->delete();
    Student::findOrFail(68)->delete();
    return "Deleted Succseefully";
  }

  public function queryScope(){
    $item = Student::male()->get();
    return $item;
  }
}


## THIS IS THE SECTION FOR USEFUL CODE SNIPIT


#THIS IS HOW TO USE QUERYBUILDER

    // public function addData(){
    //   DB::table('students')->insert([
    //     'name' =>'tester',
    //     'email'=> 'tester@gmail.com',
    //     'age' => 15,
    //     'date_of_birth'=>'2010-01-01',
    //     'gender'=> 'm'
    //   ]);
    //   return ("Added Succesfully");
    // }

    // public function getData(){
    //   $item =DB::table('students')
    //   ->select('id','name')
    //   ->where('id','<=',53)
    //   ->orWhere('id','=',0)
    //   ->get(); #If only one data is needed then type first instead of get
    //   /*
    //   ->where('id','<=',53)
    //   ->orWhere('id','=',0)
    //   */

    // return $item;

    
    // }
    // public function updateData(){

    // DB::table('students')->where('id','53')->update(
    //   [
    //     'name'=> 'tester2',
    //     'age'=>34
    //   ]
    // );
    // return ('Updated Succcesfully');
    // }

    // public function deleteData(){
    //   DB::table('students')->where('id','53')->delete();

    //   return ('Deleted Succesfully');
    // }
