<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required', 
            'email'=>'required|email|unique:users,email',
            'password'=>'required', 
            'c_password'=>'required|same:password', 
        ]);
        if ($validator->fails()) {
            $response=[
                'success'=>false,
                'message'=>$validator->errors()->first()
            ];
            return response()->json($response,200);
        }
        $input=$request->all();
        $input['password']=bcrypt($input['password']);
        $user=User::create($input);

        $success['token']=$user->createToken('MyApp')->plainTextToken;

        $response=[
            'success'=>true,
            'data'=>$success,
            'message'=>"User registered successfully",
        ];
        return response()->json($response,200);
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $success['token'] = $request->user()->createToken('MyApp')->plainTextToken;
            $success['name'] = Auth::user()->name;
            return response()->json(['success'=>true,
                'data'=>$success,
                'message'=>"User login successfully",], 200);
        } else {
            return response()->json([
                'success'=>false,
                'message'=>"Unauthorized"], 200);
        }
    }
}
