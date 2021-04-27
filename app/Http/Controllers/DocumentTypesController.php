<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypesController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'userIsAdmin']);
    }

    
    public function index() {
        $data = DocumentType::all();
        return view('document_types.index', ['types'=>$data]);
    }

    public function create() {
        return view('document_types.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'document_type_name'=> 'required|max:255'
        ]);

        DocumentType::create([
            'document_type_name'=>$request->document_type_name,
        ]);

        return redirect()->route('type.index');
    }
}
