<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class LoginController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'Rut' => 'required|Rut',
            'email' => 'required|email',
            'Contrasena' => 'required|confirmed'
        ]);

        $user = new User();
        $user->Rut = $request->Rut;
        $user->email = $request->email;
        $user->Contrasena = Hash::make($request->Contrasena);
        $user->save();

        Auth::login($user);

        return redirect()->intended('private');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Rut' => 'required|Rut',
            'Contrasena' => 'required'
        ]);

        $credentials = $request->only('Rut', 'Contrasena');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('private');
        }

        return back()->withErrors([
            'Rut' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/logout');
    }
}
