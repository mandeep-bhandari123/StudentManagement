<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentAddRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');

            if (is_numeric($search)) {
                $query->orWhere('age', $search);
            }

            if (strtotime($search)) {
                $query->orWhere('date_of_birth', $search);
            }
        })->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create( StudentAddRequest $request){

      #Validating User Input
      // $request->validate([
        // 'name'=>"required|string|max:225",
        // "email"=>"required|email|unique:students:email",
        // "age"=>"required|integer|min:1|max:100",
        // "date_of_birth"=>"required:date",
        // "gender"=>"required|in:m,f",
        // "score" => "required|integer|min:0|max:100"
      // ]
      // ,[
      //   'name.require'=>"Please wiite Student Name"]   We can create custome error messages
      // ); 
      $imagePath = null;
      if ($request -> hasFile('image')){
        $imagePath = $request->file('image')->store('photos','public');
      }

      $student = new Student();
      $student ->name = $request ->name;
      $student ->email = $request -> email;
      $student ->age = $request -> age;
      $student->date_of_birth = $request->date_of_birth; // you were missing this too
      $student ->gender = $request -> gender;
      $student->save();
      return redirect('student');
    } 
    public function edit($id)
    {
      $student = Student::findOrFail($id);
      return view('students.edit', compact('student'));
    }
    public function update(Request $request, $id){
      $student = Student::findOrFail($id);  // ✅ find existing
      $student->name = $request->name;      // ✅ modify it
      $student->email = $request->email;
      $student->age = $request->age;
      $student->gender = $request->gender;
      $student->date_of_birth = $request->date_of_birth; // you were missing this too
      $student->save();                     // ✅ save() is clearer for updates
      return redirect('student');

    }
    public function destroy(Request $request , $id)
    {
      $student = Student::findOrFail($id)->delete();
      return redirect('student');
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


  //    public function addData()
  // {
  //   $item = new Student();
  //   $item->name = 'Tester 2.0';
  //   $item->email = 'tester2@gmail.com';
  //   $item->age = 34;
  //   $item->date_of_birth = '2020-01-20';
  //   $item->gender = 'f';
  //   $item->save();
  // }
  // public function getData(){
  //   $items = Student::select('id','name')
  //   // ->find(55);
  //   ->where('id','=','58')
  //   ->first();
  //   // $items = Student::onlyTrashed()->get(); # TO get deleted data
  //   // $items = Student::withTrashed()->get(); # To get datas with deleted datas
  //   // $items  = Student::withTrashed()->find(68)->restore(); #To restore Deleted data
  //   //Student::find(1)->forceDelete(); # Permanently delete data
  //   return $items;
  // }
  // public function updateData(){
  //   $item = Student::where('id','=','58')->first();
  //   $item ->name = 'Updated Student';
  //   $item -> age = 34;
  //   $item->save();
  //   return "updated";
  // }
  // public function deleteData(){
  //   // $item = Student::where("id","=","52")->first();
  //   // $item->delete();
  //   Student::findOrFail(68)->delete();
  //   return "Deleted Succseefully";
  // }

  // public function queryScope(){
  //   $item = Student::male()->get();
  //   return $item;
  // }
