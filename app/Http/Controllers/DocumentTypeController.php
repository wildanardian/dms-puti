<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $documentTypes = DocumentType::select('*');
            return DataTables::of($documentTypes)->addIndexColumn()->make(true);
        }
        return view('document_type.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('document_type.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $documentType = DocumentType::create([
            'name' => $request->name,
        ]);

        if($documentType) {
            toastr()->success('Document type created successfully.');
            return redirect()->route('document-types.index');
        }else {
            toastr()->error('Failed to create document type.');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentType $documentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentType $documentType)
    {
        $documentType = DocumentType::find($documentType->id);
        return view('document_type.form', compact('documentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentType $documentType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $documentType = DocumentType::find($documentType->id);
        $documentType->name = $request->name;
        $documentType->save();

        if($documentType) {
            toastr()->success('Document type updated successfully.');
            return redirect()->route('document-types.index');
        }else {
            toastr()->error('Failed to update document type.');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentType $documentType)
    {
        $documentType = DocumentType::find($documentType->id);
        $documentType->delete();

        if($documentType) {
            toastr()->success('Document type deleted successfully.');
            return redirect()->route('document-types.index');
        }else {
            toastr()->error('Failed to delete document type.');
            return back();
        }
    }
}
