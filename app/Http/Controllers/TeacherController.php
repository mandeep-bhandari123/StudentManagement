<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index(){
        return Teacher::all();
    }
    public function add(){
        $item = new Teacher();
        $item->name= "Test Name";
        $item->save();

        return "Added Successfully";
    }

    public function show($id){
       $item = Teacher::findOrFail( $id );
       return $item;
  }

      public function update($id)
      {
        $item = Teacher::findOrFail( $id );
        $item -> name = 'Updated Teacher';
        $item->update();
        return 'Updated Successfully';
      }

      public function delete($id){
        $item = Teacher::findOrFail( $id );
        $item->delete();
        return 'Deleted Successfully';
      }
}
