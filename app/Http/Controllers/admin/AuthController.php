<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\ClientAuth;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function Login(Request $request){
      
        try{
                $userCredential = $request->only('email','password');
                if(Auth::attempt($userCredential)){
                    $user = Auth::user();
                    $token = $user->createToken('app')->accessToken;
                        $route = $this->redirectDash();
                        return redirect($route)->with([
                            'message' => 'successfully logged in',
                            'token' => $token,
                            'user' => $user,
                        ],200);
                    }
        }
        catch(Exception $exception){
            return back()->with('error','Username & Password is incorrect');
        }
        return response([
            'error' => 'invalid id / password'
        ],401);
        } //end method


    public function redirectDash(){
        $redirect = '';

        if(Auth::user() && Auth::user()->role == "super_admin"){
            $redirect = '/super-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == "admin"){
            $redirect = '/admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == "staff"){
            $redirect = '/staff/dashboard';
        }
        else{
            $redirect = '/login';
        }

        return $redirect;
    }

        public function Register(RegisterRequest $request){
    
            try{
                
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'password' => Hash::make($request->password) 
                ]);
                $token = $user->createToken('app')->accessToken;
    
                return redirect()->route('login')->with([
                    'message' => 'registered success',
                    'token' =>$token,
                    'user' => $user
                ],200);
                
            } catch(Exception $exception){
                return response([
                    'message' => $exception->getMessage()
                ],400);
            }
    
        } //end method

        public function UserRegister(RegisterRequest $request){
    
            try{
                $user = ClientAuth::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                    'firm' => $request->firm,
                    'portal' => $request->portal,
                ]);
                $token = $user->createToken('app')->accessToken;
    
                return response([
                    'message' => 'registered success',
                    'token' =>$token,
                    'user' => $user
                ],200);
                
            } catch(Exception $exception){
                return response([
                    'message' => $exception->getMessage()
                ],400);
            }
    
        } //end method

        public function UserLogin(Request $request){
            try{
                $validatedData = $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required']
                ]);
                $user = ClientAuth::where(['email' => $validatedData['email']])->first();
                $token = $user->createToken('app')->accessToken;

                return response([
                    'message' => 'successfully logged in',
                    'token' => $token,
                    'user' => $user,
                ],200); 

            }
            catch(Exception $exception){
                return response([
                    'message' => $exception->getMessage()
                ],400);
            }
        } //end method

        public function AdminLogout(){
            Auth::logout();
            return Redirect()->route('login');
        }//end method
    
    
}
