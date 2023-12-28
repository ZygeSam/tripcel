<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthSignupRequest;
use App\Http\Requests\AuthSigninRequest;

class AuthController extends Controller
{

    public function canSignUp ($request, $modelName){
        $request->validated($request->all);
        $model = "App\\Models\\" . $modelName;
        $ifRegistered =  $model::where('email', $request['email'])->first();
        if($ifRegistered){
            return false;
        }
        return true;
    }

    public function regSignUp($request, $modelName){
        $model = "App\\Models\\" . $modelName;
        $user = $model::create($request);
        return $user;
     }
    public function signup(AuthSignupRequest $request){
        $validatedData = $request->validated();
        if($this->canSignUp($request, 'User') !== true){
            return redirect()->back()->withInput()->with('message',"This email has been taken"
            );
       }
       $user = $this->regSignUp($validatedData,'User');
       return redirect()->to('/login');
    }

    public function register(){
        return view('pages.signup');
    }
    
    public function login(){
        return view('pages.login');
    }

    public function signin(AuthSigninRequest $request){
        if($this->canLogIn($request) !== true){
            return redirect()->back()->withInput()
            ->with('message',"Login failed, Credentials don't match"
            );
        }
        $user =  $this->logSignin(Auth::user(), 'authToken', 'user');
        return redirect()->route('client.index');
    }

    public function canLogIn($request, $guard = null) {
        $request->validated();
        if (is_null($guard)) {
            if (!Auth::attempt($request->only('email', 'password'))) {
                return false;
            }
        } else {
            if (!Auth::guard($guard)->attempt($request->only('email', 'password'))) {
                return false;
            }
        }
        return true;
    }
    
    public function logSignin($actor,  $ability){
        return $actor;
    }
    

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}
