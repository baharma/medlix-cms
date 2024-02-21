<?php

namespace App\Http\Controllers;

use App\Models\CmsApp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        $data['title'] = 'Login';
        return view('auth.login',$data);
    }
    public function authenticate(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with validation errors
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication successful, redirect to dashboard or desired location
            return redirect()->intended('/set-cms');
        } else {
            // Authentication failed, redirect back with error message
            return redirect()->back()->withErrors([
                'credentials' => 'Invalid email or password.',
            ])->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // This will log out the currently authenticated user.

        // You can also flush the session data if needed.
        $request->session()->flush();

        // Redirect the user to the login page or any other desired page after logout.
        return redirect()->route('login');
    }
    public function setCms(){
        $data['title'] = 'Set CMS';
        $access = Auth::user()->access;
        $accessData = json_decode($access, true);
        $dataApps = collect($accessData)->map(function($event){
            $dataCmsApp = CmsApp::find($event);
            return $dataCmsApp;
        });
        $data['cms'] = $dataApps['app_id'];
        return view('auth.set-cms',$data);

    }
    public function setCmsId($id){
       
        $user = User::find(Auth::user()->id);
        $user->default_cms = $id;
        $user->save();
        return redirect()->intended('/dashboard');
    }
}
