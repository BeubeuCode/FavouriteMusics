<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request) {
        $creds = $request->only('email', 'password');
        if(Auth::attempt($creds)) { return redirect('/'); }
    }
}
