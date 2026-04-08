<?php

namespace App\Http\Controllers;

use App\Models\VisaDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisaDocumentController extends Controller
{
    public function index()
    {
        return response()->json(Auth::user()->visaDocuments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'document_type' => 'required|string',
            'document_number' => 'required|string',
            'expiry_date' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $doc = new VisaDocument();
        $doc->user_id = Auth::id();
        $doc->document_type = $request->document_type;
        $doc->document_number = $request->document_number;
        $doc->expiry_date = $request->expiry_date;
        
        if ($request->hasFile('file')) {
            $doc->file_path = $request->file('file')->store('visa_docs');
        }

        $doc->save();

        return response()->json($doc, 201);
    }

    public function show($id)
    {
        $doc = VisaDocument::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($doc);
    }

    public function destroy($id)
    {
        $doc = VisaDocument::where('user_id', Auth::id())->findOrFail($id);
        $doc->delete();
        return response()->json(null, 204);
    }
}
