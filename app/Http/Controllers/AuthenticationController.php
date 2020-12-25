<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $emailPassword = $request->only('email', 'password');

        if (auth()->attempt($emailPassword)) {
            if (auth()->user()->penulis) {
                return redirect()->intended('/penulis/dashboard');
            } else if (auth()->user()->admin) {
                return redirect()->intended('/admin/dashboard');
            }
        }

        return back();
    }
}
