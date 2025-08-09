<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthWebController extends Controller
{
    public function showLoginForm()
        {
            return view('auth.login');
        }


    public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');

            if (!Auth::guard('web')->attempt($credentials)) {
                return back()->withErrors(['message' => 'Login incorreto']);
            }

            $request->session()->regenerate();

            return redirect()->intended('transacoes');
        }
}