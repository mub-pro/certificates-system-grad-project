<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'userIsAdmin']);
    }

    public function index() {
        $data = College::all();
        return view('colleges.index', ['colleges'=>$data]);
    }

    public function create() {
        return view('colleges.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'college_name'=> 'required|max:255'
        ]);

        College::create([
            'college_name'=>$request->college_name,
        ]);

        return redirect()->route('college.index');
    }
}
