<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }


    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // $this->validate($request, [
        //     'first_name'=> 'required|max:255',
        //     'last_name'=> 'required|max:255',
        //     'email'=> 'required|email',
        //     'password'=> 'required|confirmed|min:8',
        // ]);

        // $role = Role::where('role_name', '=', 'student')->firstOrFail()->id;
        User::create([
            'first_name'=> 'mubarak',
            'last_name'=> 'bakarman',
            'email'=> 'm@m.com',
            'password'=> Hash::make('123456789'),
            'role_id'=> 1,
            'hashid'=> Hash::make($request->id),
        ]);

       Auth::attempt($request->only('email', 'password'));
       
    //    if (Auth::user()->role->role_name == 'admin') {
    //         return redirect()->route('users.index');
    //     }
            return redirect()->route('documents.index');
    
    }
}
