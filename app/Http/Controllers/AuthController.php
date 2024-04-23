<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTBlacklist;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return redirect('/')
            ->withErrors([
                'email' => 'Email or password is incorrect.',
            ]);
    }


    // LOGIN JWT
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (! $token = JWTAuth::attempt($credentials)) {
    //         return response()->json(['error' => 'Invalid credentials'], 401);
    //     }

    //     $user = auth()->user(); // Mengambil instance user yang sedang login

    //     Mengenerate token berdasarkan user yang valid
    //     $token = JWTAuth::fromUser($user);

    //     return response()->json(compact('token'));
    //     return Redirect::route('dashboard')->with('token', $token);
    // }

 
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
