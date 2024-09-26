<?php

namespace App\Http\Controllers;

use App\Models\special_permission;
use App\Models\vehicle_type;
use Illuminate\Http\Request;

class SpecialPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $permisions = [];
        if( @$_GET['placa'])
        {
            $placa = $_GET['placa'] ;
            $permisions = special_permission::where('placa',"=",$placa)->get();
        }

        // if( @$_GET['lateral'])
        // {
        //     $lateral = $_GET['lateral'];
        //     $permisions = $permisions->where('lateral',"=",$lateral);
        // }
        
       
        $tipoVehiculoArray = vehicle_type::all();
        $tipoVehiculo = [];
        foreach( $tipoVehiculoArray as $vehiculo)
        {
            $tipoVehiculo[$vehiculo->id] = $vehiculo->name;
        }
        $token = csrf_token();
        return inertia('specialPermission/index',['permisions' => $permisions, 'tipoVehiculo'=> $tipoVehiculo,'token'=>$token]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoVehiculo = vehicle_type::all();
        return inertia('specialPermission/create',['tipoVehiculo'=> $tipoVehiculo]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'placa'     => 'required|string|max:6',
            'lateral'   => 'numeric',
            'vehicle_type_id' =>'required|numeric' ,
            'permiso'   =>'required|string|max:255'
        ]);

        special_permission::create($validate);
        return redirect('permission');
    }

    /**
     * Display the specified resource.
     */
    public function show(special_permission $special_permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(special_permission $special_permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, special_permission $special_permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(special_permission $special_permission)
    {
        return $_REQUEST;
        // return $special_permission;
        $special_permission->delete();
    }

    //se usa esta funcion para borrar debido a que destroy() marca error 404
    public function borrar(special_permission $special_permission)
    {
        $special_permission->delete();
    }

}