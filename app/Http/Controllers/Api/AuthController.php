<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UpdateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Notifications\SignupActivate;
use App\Observers\UserObserver;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(LoginUserRequest $request)
    {
        if (auth()->attempt($request->all())) {
            if (auth()->user()->status_id != 1){
                return response()->json(['message'=>'User can not Login'], 401);
            }
            $token = auth()->user()->createToken('Web')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Login Credentials were wrong '], 401);
        }
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->attachRole('client');
        //$user->notify(new SignupActivate($user));
//        $token = $user->createToken('mobile')->accessToken;
        return response()->json(['message' => 'User Created Successfully'], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ],200);
    }
    public function user(Request $request){
        return response()->json($request->user());
    }

    public function update_user(Request $request){
        if ($request->password){
            $request['password'] = bcrypt($request->password);
        }
        Auth::user()->update($request->only('password'));
        return response()->json([
            'message' => 'User Updated Successfully'
        ],200);
    }


    public function signupActivate($token){
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->email_verified_at = Carbon::now();
        $user->activation_token = '';
        $user->save();
        return view('verification.index');
    }

}
