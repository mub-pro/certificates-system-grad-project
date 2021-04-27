<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Degree;
use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class DocumentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('userIsAdmin')->except(['index', 'show']);
    }

    public function index() {
        if (Auth::user()->role_id == 1) {
            $data = Document::with('document_type')->get();
        }
        else {
            $data = Document::where('user_id', Auth::user()->id)->get();
        }

        return view('documents.index', ['documents'=>$data]);
    }

    public function create() {

        $types = DocumentType::all();
        $degrees = Degree::all();
        $students = User::where('role_id', 2)->get();
        return view('documents.create', ['types'=> $types, 'degrees'=>$degrees, 
        'students'=>$students]);
    } 

    public function store(Request $request) {
        $this->validate($request, [
            'document_name'=> 'required',
            'document_description'=>'required',
            'student'=> 'required',
            'degree'=> 'required',
            'type'=> 'required'
        ]);
        Document::create([
            'document_name'=>$request->document_name,
            'document_description'=>$request->document_description,
            'document_issue_date'=>now()->format('Y-m-d'),
            'user_id'=> $request->student,
            'degree_id'=> $request->degree,
            'document_type_id'=> $request->type,
        ]);
        

        return redirect()->route('documents.index');
    }

    public function show($id) {
        if (Auth::user()->role_id == 1) {
            $data = Document::findOrFail($id);
        }
        else {
            $data = Document::where('user_id', Auth::user()->id)->findOrFail($id);
        }
        

        return view('documents.show', ['document'=>$data]);
    }
}
