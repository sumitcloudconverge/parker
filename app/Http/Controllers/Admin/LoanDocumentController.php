<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanDocument;
use App\Models\LoanApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoanDocumentController extends Controller
{
    public function index()
    {
        $items = LoanDocument::latest()->paginate(15);
        return view('admin.loan-documents.index', compact('items'));
    }

    public function create()
    {
        return view('admin.loan-documents.create', ['apps'=>LoanApplication::orderByDesc('id')->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'loan_application_id'=>'required|exists:loan_applications,id',
            'document_type'=>'required|string',
            'file'=>'required|file|mimes:pdf,jpg,jpeg,png,txt|max:4096',
        ]);
        $path = $request->file('file')->store('loan-documents/'.$data['loan_application_id'], 'public');
        LoanDocument::create([
            'loan_application_id'=>$data['loan_application_id'],
            'document_type'=>$data['document_type'],
            'file_path'=>$path,
            'status'=>'pending'
        ]);
        return redirect()->route('admin.loan-documents.index')->with('success','Document uploaded.');
    }

    public function edit(LoanDocument $loan_document)
    {
        return view('admin.loan-documents.edit', ['doc'=>$loan_document]);
    }

    public function update(Request $request, LoanDocument $loan_document)
    {
        $data = $request->validate([
            'document_type'=>'required|string',
            'status'=>'required|in:pending,approved,rejected',
            'remarks'=>'nullable|string',
            'file'=>'nullable|file|mimes:pdf,jpg,jpeg,png,txt|max:4096',
        ]);
        if ($request->hasFile('file')) {
            if ($loan_document->file_path) Storage::disk('public')->delete($loan_document->file_path);
            $loan_document->file_path = $request->file('file')->store('loan-documents/'.$loan_document->loan_application_id, 'public');
        }
        $loan_document->document_type = $data['document_type'];
        $loan_document->status = $data['status'];
        $loan_document->remarks = $data['remarks'] ?? null;
        $loan_document->save();
        return redirect()->route('admin.loan-documents.index')->with('success','Document updated.');
    }

    public function destroy(LoanDocument $loan_document)
    {
        if ($loan_document->file_path) Storage::disk('public')->delete($loan_document->file_path);
        $loan_document->delete();
        return redirect()->route('admin.loan-documents.index')->with('success','Document deleted.');
    }

    public function updateStatus(Request $request, LoanDocument $loan_document)
    {
        $request->validate(['status'=>'required|in:approved,rejected','remarks'=>'nullable|string']);
        $loan_document->update(['status'=>$request->status,'remarks'=>$request->remarks]);
        return back()->with('success','Status updated.');
    }
}
