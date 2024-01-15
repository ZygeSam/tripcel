<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Services\MailService;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthSignupRequest;
use App\Http\Requests\AuthSigninRequest;
use App\Http\Requests\ResetPaswordRequest;
use App\Http\Requests\ForgotPaswordRequest;

class AuthController extends Controller
{
    protected $mailService;
    public function __construct(MailService $mailService){
        $this->mailService = $mailService;
    }

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

    public function adminRegister(){
        return view('pages.adminSignup');
    }

    public function adminLogin(){
        return view('pages.adminLogin');
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
        return redirect('/');
    }

    public function forgotPassword(){
        return view('pages.forgotPassword');
    }

    public function PasswordChange(ForgotPaswordRequest $request){
        $validatedData = $request->validated();
        $user =  User::where('email', $validatedData['email'], 3)->firstOr(function () {
            return redirect()->back()->with('message', 'Invalid Email');
        });
        $passwordUpdate = URL::temporarySignedRoute(
            'passwordUpdate', now()->addMinutes(10), ['email' => $user['email']]
        );
        $sentMail = $this->mailService->sendForgotPasswordInfo($request['email'], $passwordUpdate);
        if($sentMail){
            return redirect()->back()->with('message', 'Please check your mail to complete password reset');
        }
    }

    public function passwordUpdate(Request $request, $email){
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        return view('pages.passwordUpdate', compact('email'));
    }

    public function resetPassword(ResetPaswordRequest $request){
        $validatedData = $request->validated();
        $user =  User::where('email', $validatedData['email'], 3)->firstOr(function () {
            return redirect()->back()->with('message', 'Invalid Email');
        });
        if($user){
            $user->password = $request->password;
            $user->save();
            $message = new HtmlString("Password Reset Successfully, Click here to <a class='btn btn-outline-success' href='". route('login') ."'>Login</a>");
            session()->flash('message', $message);
            return redirect()->back();
        }
        
    }
}
