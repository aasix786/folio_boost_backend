<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone_no' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $password = $request->input('password');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone_no = $request->input('phone_no');

        $input = [
            'uuid'=>Str::uuid(),
            'name'=>$name,
            'email'=>strtolower($email),
            'phone_no'=>$phone_no,
            'status'=> 1,
            'verify_user'=> 1,
            'image'=> 'assets/imgs/user_avatar.png',
            'password'=> bcrypt($password),
        ];

        $user = User::create($input);
        if ($user){
            $response = [
                'success'=>true,
                'message'=>'User register successfully.',
                'user'=>$user,
            ];

        }else{
            $response = [
                'success'=>false,
                'message'=>"User couldn't register",
                'user'=>$user,
            ];
        }




        return $response;
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|string',
            'password' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::query()->where('email', strtolower($email))->where('admin', 0)->first();


        if ($user){
            $check_password = Hash::check($password,$user->password);
if($check_password){
    return response()->json([
        'success'=>true,
        'data'=>$user,
    ]);
}else{
    return response()->json([
        'success'=>false,
        'message'=>"Password is incorrect",
    ]);
}


        }else{
            $response = [
                'success'=>false,
                'message'=>'Email is incorrect',
            ];
        }



        return $response;
    }






    private function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
