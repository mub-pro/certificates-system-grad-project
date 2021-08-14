<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Degree;
use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('userIsAdmin')->except('index', 'show', 'download');
    }

    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $data = Document::with('document_type')->get();
        } else {
            $data = Document::where('user_id', Auth::user()->id)->get();
        }

        return view('documents.index', ['documents' => $data]);
    }

    public function create()
    {

        $types = DocumentType::all();
        $degrees = Degree::all();
        $students = User::where('role_id', 2)->get();
        return view('documents.create', [
            'types' => $types, 'degrees' => $degrees,
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        // dd(11);
        // $this->validate($request, [
        //     'document_name' => 'required',
        //     'document_description' => 'required',
        //     'student' => 'required',
        //     'degree' => 'required',
        //     'type' => 'required',
        //     'pdf_file' => 'required|file'
        // ], [], ['pdf_file' => 'file'],);

        // $new_file_name =
        //     time() . '-' .
        //     $request->document_name . '.' .
        //     $request->pdf_file->extension();

        // $request->pdf_file->storeAs('public/pdf_files', $new_file_name);

        Document::create([
            'document_name' => '$request->document_name',
            'document_description' => '$request->document_description',
            'document_issue_date' => now()->format('Y-m-d'),
            'user_id' => $request->student,
            'degree_id' => $request->degree,
            'document_type_id' => $request->type,
            'pdf_file' => '$new_file_name',   
            'hashid' => Hash::make(now()->format('Y-m-d')),
            
        ]);


        return redirect()->route('documents.index');
    }

    public function show($id)
    {
        if (Auth::user()->role_id == 1) {
            $data = Document::findOrFail($id);
        } else {
            $data = Document::where('user_id', Auth::user()->id)->first();
        }

        return view('documents.show', ['document' => $data]);
    }

    public function download($file)
    {
        return Storage::download('public/pdf_files/'.$file);
    }

    public function destroy($id) {
        $document = Document::findOrFail($id);
        $document->delete();
        return redirect()->route('documents.index')->with('message', 'The document has been deleted!');
    }

}
