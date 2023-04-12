<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    
    public function index() {
        return view('contents.authentication.signin');
    }

    public function signin(SignInRequest $request) {

        try {

            $credentials = ['email' => $request->email, 'password' => $request->password];
            
            if(Auth::attempt($credentials)) {
                return redirect()->route('car.index');
            }

            return back()->with('error', 'Invalid credentials');

        } catch (\Throwable $th) {
            info('Signin error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong.');
        }

    }

}
