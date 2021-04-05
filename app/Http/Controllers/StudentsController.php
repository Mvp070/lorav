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

    public function registerStudents(Request $req)
    {
        $l = false;
        $cal ="";
        if($req->name == null)
        {
            $l = true;
            $cal .='Name не на базе';
        }
        if($req->last_name == null)
        {
            $l = true;
            $cal .='Surname не на базе';
        }
        if($req->age == null)
        {
            $l = true;
            $cal .='Age не на базе';
        }
        if($req->date_of_birth == null)
        {
            $l = true;
            $cal .='Date_of_birth не на базе';
        }
        if($req->phone_number == null)
        {
            $l = true;
            $cal .='Phone_number не на базе';
        }
        if($req->password == null)
        {
            $l = true;
            $cal .='Password не на базе';
        }
        if($l == false)
        {
            $student = new Student();
            $student -> create($req->all());
            $cal = 'Все ок!';
        }

            return response()->json($cal);
    }

	public function singStudents(Request $req)
    {
        $student = Student::where('phone_number', $req->phone_number)->first();

        if(!$student)
        	return response()->json('Где логин');
            
        if($req->password != $student->password)
           
            return response()->json('Где пароль');
        return response()->json('Все ок!'); 
        
            
        
    }
}

