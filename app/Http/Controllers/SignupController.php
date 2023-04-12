<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index() {
        return view('contents.authentication.signup');
    }

    public function signup(SignupRequest $request) {
        
        try {
            
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            return redirect()->route('signin.index')->with('success', 'Registration successful. You can now sign in.');

        } catch (\Throwable $th) {
            info('Signup error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong.');
        }

    }
}
