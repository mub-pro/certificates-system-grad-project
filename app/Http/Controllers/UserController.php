<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'userIsAdmin']);
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
        // $roles = Role::all();
        // return view('users.create', ['roles'=>$roles]);
        return Storage::download('file.pdf');
    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'first_name'=> 'required|max:255',
            'last_name'=> 'required|max:255',
            'email'=> 'required|email',
            'password'=> 'required|confirmed|min:8',
            'role'=> 'required'
        ]);
        
        User::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role_id'=> $request->role,
        ]);
        
            return redirect()->route('users.index');
    }

    public function show($id) {
        $data = User::findOrFail($id);

        return view('users.show', ['user'=>$data]);
    }

    // show edit page
    public function edit() {
        //
    }

    public function update() {
        //
    }

    public function destroy() {
        //
    }
}
