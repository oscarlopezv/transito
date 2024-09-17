<?php

namespace App\Http\Controllers;

use App\Models\document_type;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoDoc = document_type::all();
        return inertia('documentType/index',['tipoDoc' => $tipoDoc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('documentType/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validate = $request->validate([
            'name' => "required|string"
        ]);

        document_type::create($validate);
        return redirect('document_type');
    }

    /**
     * Display the specified resource.
     */
    public function show(document_type $document_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(document_type $document_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, document_type $document_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(document_type $document_type)
    {
        $document_type->delete();
        return redirect('document_type');

    }
}
