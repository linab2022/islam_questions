<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function register(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'user_name' => 'required',
                'email' => 'required|unique:users,email| email',
                'password' => 'required',
                'c_password' => 'required | same:password',
            ]);

            if ($validator->fails()){
                return $this->SendError('Validate Error', $validator->errors());
            }
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);        
            return $this->SendResponse($user, 'User is registered successfully');
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }

    public function login(Request $request){   
        try {    
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();		    
                $success['user_name'] = $user->user_name;
                $success['email'] = $user->email;
                return $this->SendResponse($success, 'User is logged in successfully');
            }else{
                return $this->SendError('Unauthorised', ['error', 'Unauthorised']);
            }
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }
}
