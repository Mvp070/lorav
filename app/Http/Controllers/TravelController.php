<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Travals;
use App\Student;
use Illuminate\Support\Str;

class TravelController extends Controller
{
    public function getTravel()
    {
    	$travals = Travals::get();

    	return response()->json($travals);
    }

	public function addTravel(Request $req)
	{
		$student = Student::where("api_token", $req->header("api_token"))->first();
		if(!$student) 
			return response()->json("Пользователь не авторизован");
		$valid = Validator::make($req->all(), [
		'from_id'=>'required',
		'from_data'=>'required',
		'back_id'=>'required',
		'back_data'=>'required',
		]);

		if($valid->fails()) 
			return response()->json($valid->errors());
		$code = Str::random(5);
		$travals = [
		"user_id"=> $student->id,
		"code" => $code,
		'from_id'=> $req->$from_id,
		'from_data'=>$req->from_data,
		'back_id'=>$req->back_id,
		'back_data'=>$req->back_data,
		];
		Travals::create($travals);
		return response()->json("Код бронирования: " .$code);
	}
}
