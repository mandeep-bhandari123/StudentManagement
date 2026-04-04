<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function Laravel\Prompts\table;

class StudentController extends Controller
{

    public function addData(){
      DB::table('students')->insert([
        'name' =>'tester',
        'email'=> 'tester@gmail.com',
        'age' => 15,
        'date_of_birth'=>'2010-01-01',
        'gender'=> 'm'
      ]);
      return ("Added Succesfully");
    }

    public function getData(){
      $item =DB::table('students')
      ->select('id','name')
      ->where('id','<=',53)
      ->orWhere('id','=',0)
      ->get(); #If only one data is needed then type first instead of get
      /*
      ->where('id','<=',53)
      ->orWhere('id','=',0)
      */

    return $item;

    
    }
    public function updateData(){

    DB::table('students')->where('id','53')->update(
      [
        'name'=> 'tester2',
        'age'=>34
      ]
    );
    return ('Updated Succcesfully');
    }

    public function deleteData(){
      DB::table('students')->where('id','53')->delete();

      return ('Deleted Succesfully');
    }

}
