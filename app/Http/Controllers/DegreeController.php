<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'userIsAdmin']);
    }

    
    public function index() {
        $data = Degree::all();
        return view('degrees.index', ['degrees'=>$data]);
    }

    public function create() {
        return view('degrees.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'degree_name'=> 'required|max:255'
        ]);

        Degree::create([
            'degree_name'=>$request->degree_name,
        ]);

        return redirect()->route('degree.index');
    }
}
