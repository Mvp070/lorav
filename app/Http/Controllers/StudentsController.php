<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    public function getStudents()
    {
    	$student = Student::get();

    	return response()->json($student);
    }

    public function addStudents(Request $req )
    {
    	$student = new Student();

    	$student->name = $req->name;
    	$student->last_name = $req->last_name;
    	$student->age = $req->age;

    	$u = $student->save();

    	if($u)
    		return "Все ок!";
    	return "Все не ок!";

    }
    public function updateStudents(Request $req)
    {
    	$student = Student::where("id", $req->id)->first();

    	$student->name = $req->name;
    	$student->last_name = $req->last_name;
    	$student->age = $req->age;

    	$student->save();

    	return response()->json($student);
    }
}

