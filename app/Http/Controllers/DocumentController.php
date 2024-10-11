<?php

namespace App\Http\Controllers;

use App\Models\document;
use App\Models\document_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = document::all();
        $tipoDocumento = [];

        foreach(document_type::all() as $doc)
        {
            $tipoDocumento[$doc->id] = $doc->name;
        }
      
        return inertia('documents/index',
        [
            "documents"=>$documents,
            "tipoDocumento" => $tipoDocumento,
            "storage_path"=>public_path()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoDocumento = document_type::all();
        return inertia('documents/create',['tipoDocumento'=>$tipoDocumento]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'document_type_id'=>'required|integer',
            'name' => "required|string",
            'file' => "required|mimes:pdf"
        ]);

        $file = $request->file('file');
        $ruta = $file->store('uploads', 'public');

        $document = new document();
        $document->document_type_id = $validate['document_type_id'];
        $document->name = $validate['name'];
        $document->ruta = $ruta;
        $document->save();

        return redirect('documents');
    }

    /**
     * Display the specified resource.
     */
    public function show(document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(document $document)
    {
        $document->delete();
        return redirect('documents');
    }
}
