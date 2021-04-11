<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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




    public function registerValid(Request $req)
    {
        $valid = Validator::make($req->all(), [
        'name' => 'required',
        'last_name' => 'required',
        'age' => 'required',
        'date_of_birth' => 'required',
        'phone_number' => 'required',
        'password' => 'required',
        ]);

        if ($valid->fails())
            return response()->json($valid->errors());

        $student = Student::create($req->all());
        return response()->json('Регистрация прошла успешно');
    }
        

       
        public function loginValid(Request $req) 
    {
        $valid = Validator::make($req->all(), [
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors());
        }

        if($student = Student::where('phone_number', $req->phone_number)->first())
        {
            if ($req->password == $student->password)
            {
                $student->api_token=str_random(50);
                $student->save();
                return response()->json('Авторизацияпрошла успешно, api_token:'. $student->api_token);
            }
        }
                return response()->json('Логин или пароль введены неверно, api_token:'. $student->api_token);
    }

        
        public function logoutValid(Request $req)
        {
            $student = Student::where("api_token",$req->api_token)->first();

            if($student)
            {
                $student->api_token = null;
                $student->save();
                return response()->json('Разлогирование прошло успешно');
            }
        }
    
}



