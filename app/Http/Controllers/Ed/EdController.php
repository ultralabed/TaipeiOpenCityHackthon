<?php

namespace App\Http\Controllers\Ed;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;



class EdController extends Controller
{
 public function register(Request $request) {
    $serial_number = $request->input('serial_number');
    if($this->userHasExist($serial_number)) {
        return 'already-exist';
    }

    $this->addUser($request);

    return 'sign-up-complete';
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

 public function login(Request $request) {
    $serial_number_from_input = $request->input('serial_number');
    $mobile_phone_from_input = $request->input('mobile_phone');
    $count = User::where('mobile_phone', '=', $mobile_phone_from_input)
                    ->where('serial_number', '=' , $serial_number_from_input)
                    ->count();
    if($count === 0) {
        return 'fail';
    }

    return 'ok';
 }
}
