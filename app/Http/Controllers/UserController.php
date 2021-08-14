<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('userIsAdmin')->except('account', 'update');
    }
    
    public function index() {
        // $expireDate = Carbon::create(2021, 4, 27, 6, 24, 0, 'Asia/Riyadh');
        // $nowDate = Carbon::now();
        // $status = 'available';
        // if($expireDate > $nowDate) {
        //     $status = 'available';
        // }
        // else {
        //     $status = 'expired';
        // }
        // dd($status);
        // $date = now('asia/riyadh')->format('Y-m-d-h-M-s');
        // dd();
       
        
        $data = User::with('role')->get(); 
    
        return view('users.index', ['users'=>$data]);
    }

    // show create page
    public function create() {
        $roles = Role::all();
        return view('users.create', ['roles'=>$roles]);
    }

    public function store(Request $request) {

        // $this->validate($request, [
        //     'first_name'=> 'required|max:255',
        //     'last_name'=> 'required|max:255',
        //     'email'=> 'required|email',
        //     'password'=> 'required|confirmed|min:8',
        //     'role'=> 'required'
        // ]);
        
        User::create([
            'first_name'=> 'a',
            'last_name'=> 'b',
            'email'=> 'a@a.com',
            'password'=> Hash::make('123456789'),
            'role_id'=> 2,
            
        ]);
        
            return redirect()->route('users.index');
    }

    public function show($id) {
        $data = User::findOrFail($id);

        return view('users.show', ['user'=> $data]);
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('message', 'The user has been deleted!');
    }

    public function update(Request $request, $id) {
        User::where('id', $id)->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'college_id'=> $request->college
        ]);

        return redirect()->route('users.account')->with('message', 'The user has been updated!');
    }

    public function account() {
        $user = Auth::user();
        
        $colleges = College::all();
        
        return view('users.account', ['account'=> $user, 'colleges'=> $colleges]);
    }
}
