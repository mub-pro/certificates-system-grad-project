<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct() {
        $this->middleware(['guest']);
    }
    
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required|',
        ]);
        if (!Auth::attempt($request->only('email', 'password'))){
            return back()->with('status', 'invalid login details');
        }

        if (Auth::user()->role->role_name == 'admin') {
            return redirect()->route('users.index');
        }

        else {
            return redirect()->route('documents.index');
        }
        
    }
}
