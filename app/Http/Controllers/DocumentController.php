<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $documentType = DocumentType::all();
        $user = User::all();
        if ($request->ajax()) {
            return response()->json(['documentType' => $documentType, 'user' => $user]);
        }
        return view('documents.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'select_document_type' => 'required',
            'document_number' => 'required',
            'select_document_owner' => 'required',
            'document_name' => 'required',
            'document_file' => 'required|file|mimes:pdf|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $filename = Hash::make(strtolower(str_replace(' ', '_', $request->document_name)));
            $file->storeAs('public/documents/' . $request->document_number, $filename);
        } else {
            toastr()->error('No document file uploaded.');
            return redirect()->back()->withInput();
        }

        $document = Document::create([
            'nama_dokumen' => Hash::make(strtolower(str_replace(' ', '_', $request->document_name))),
            'nama_dokumen_asli' => strtolower(str_replace(' ', '_', $request->document_name)),
            'nomor_dokumen' => $request->document_number,
            'pemilik_dokumen_id' => $request->select_document_owner,
            'tipe_dokumen_id' => $request->select_document_type,
        ]);

        if ($document) {
            toastr()->success('Document added successfully');
            return redirect()->back();
        } else {
            toastr()->error('Document failed to add');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }

    public function getDocuments()
    {
        $documentType = DocumentType::all();
        return response()->json(['documentType' => $documentType]);
    }
}
