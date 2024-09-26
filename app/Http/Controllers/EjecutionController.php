<?php

namespace App\Http\Controllers;

use App\Models\ejecution;
use Illuminate\Http\Request;

class EjecutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('ejecution/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('ejecution/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach($request->file('files') as $file)
        {
            $ruta = $file->store('uploads', 'public');
        }

        die("");
    }

    /**
     * Display the specified resource.
     */
    public function show(ejecution $ejecution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ejecution $ejecution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ejecution $ejecution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ejecution $ejecution)
    {
        //
    }
}
