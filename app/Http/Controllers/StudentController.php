<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        return "Hello from controller";
    }

    public function aboutUs($id, $name)
    {
        //return 'ID No '.$id . " Name ".$name;

        return view('aboutus', compact('id', 'name'));
    }
}
