<?php

namespace App\Http\Controllers;

use File;
use App\Models\ejecution;
use App\Models\ejecution_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EjecutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ejecutions = ejecution::all();
        $token = csrf_token();
        return inertia('ejecution/index',['ejecutions'=>$ejecutions,'token'=>$token]);
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
        $validate = $request->validate([
            'name' => "required|string",
            'description' => "required|string",
        ]);
        
        $ejecution = ejecution::create($validate);
        $name = str_replace(' ', '', $validate['name']);
        foreach($request->file('files') as $file)
        {
            $ruta = $file->store($name, 'public');
            $ejecution_file = new ejecution_file();
            $ejecution_file->name = $file->getClientOriginalName();
            $ejecution_file->ejecution_id = $ejecution->id;
            $ejecution_file->url = $ruta;
            $ejecution_file->save();
        }
        return redirect('ejecution');
    }

    /**
     * Display the specified resource.ejecution_file
     */
    public function show(ejecution $ejecution)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ejecution $ejecution)
    {
        $files = ejecution_file::where('ejecution_id','=',$ejecution->id)->get();
        return inertia('ejecution/edit',['ejecution'=>$ejecution,'files'=>$files]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ejecution $ejecution)
    {
        
        $ejecution = ejecution::find($request->id);
        $name = str_replace(' ', '', $ejecution->name);
        $ejecution->description = $request->description;
        $ejecution->update();

        if($request->file('files'))
        {
            foreach($request->file('files') as $file)
            {
                $ruta = $file->store($name, 'public');
                $ejecution_file = new ejecution_file();
                $ejecution_file->name = $file->getClientOriginalName();
                $ejecution_file->ejecution_id = $ejecution->id;
                $ejecution_file->url = $ruta;
                $ejecution_file->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ejecution $ejecution)
    {
        if($ejecution->delete())
        {
            $nombreCarpeta = str_replace(' ', '', $ejecution->name);
            $dir = explode('app\Http\Controllers', dirname(__FILE__));

            $urlArchivos = ejecution_file::where("ejecution_id","=",$ejecution->id)->get();
            foreach( $urlArchivos as $archivo)
            {
                $ruta = $dir[0] ."public\storage\/" . $archivo->url;
                unlink($ruta);
                $archivo->delete();
            }
            $ruta = $dir[0] ."public\storage\/" . $nombreCarpeta;
            rmdir($ruta);
        }
    }

    public function deleteFile(Request $request)
    {

        $ejecution_file = ejecution_file::find($request->id);
       
        $url = $ejecution_file->url;
        //ruta absoluta del archivo para borrar
        $dir = explode('app\Http\Controllers', dirname(__FILE__));
        $ruta = $dir[0] ."public\storage\/" . $url;

        //Se borra el registro y el archivo
        $ejecution_file->delete();
        unlink($ruta);

        // $ejecution_file->delete();
    }
}
