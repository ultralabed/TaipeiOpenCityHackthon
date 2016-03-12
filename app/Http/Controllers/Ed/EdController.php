<?php

namespace App\Http\Controllers\Ed;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Validator;
use Auth;



class EdController extends Controller
{
    public function register(Request $request) {

        $validator = $this->registerValidation($request);

        if($validator->fails()){
            return response()->json([ 'errors' => $validator->errors()->all()]);
        }

        $serial_number = $request->input('serial_number');
        if($this->userHasExist($serial_number)) {
            return response()->json(['state'=>'already-exist']);
        }

        $this->addUser($request);

        return response()->json(['state'=>'sign-up-complete']);
    }

    public function registerValidation($request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email',
            'home_phone' => 'required',
            'mobile_phone' => 'required',
            'serial_number' => 'required|unique:users',
            'address' => 'required'
        ]);

        return $validator;
    }

    public function addUser($request){
        User::create($request->all());
    }

    public function userHasExist($serial_number){
        $user = User::where('serial_number', $serial_number);
        if($user->count() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function loginValidation($request){
        $validator = Validator::make($request->all(), [
            'mobile_phone' => 'required',
            'serial_number' => 'required',
        ]);

        return $validator;
    }

    public function login(Request $request) {

        $validator = $this->loginValidation($request);

        if($validator->fails()){
            return response()->json([ 'errors' => $validator->errors()->all()]);
        }

        $serial_number = $request->input('serial_number');
        $mobile_phone = $request->input('mobile_phone');
        $user = User::where('serial_number',$serial_number)
                    ->where('mobile_phone',$mobile_phone);
        if($user->count() > 0) {
            return response()->json(['status'=>'login successed','info'=>$user->first()]);
        }else{
             return response()->json(['status'=>'login failed']);
        }
    }
}
