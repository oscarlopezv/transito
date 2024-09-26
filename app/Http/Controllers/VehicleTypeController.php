<?php

namespace App\Http\Controllers;

use App\Models\vehicle_type;
use Illuminate\Cache\Events\RetrievingKey;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoVehiculo = vehicle_type::all();
        return inertia('vehicleType/index',['tipoVehiculo' => $tipoVehiculo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('vehicleType/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
                    'name' => "required|string"
        ]);

        vehicle_type::create($validate);
        return redirect('vehicle_type');
    }

    /**
     * Display the specified resource.
     */
    public function show(vehicle_type $vehicle_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehicle_type $vehicle_type)
    {
        return inertia('vehicleType/edit',['vehicle_type'=>$vehicle_type]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehicle_type $vehicle_type)
    {
        $validate = $request->validate([
            'name' => "required|string"
        ]);
       
        $vehicle_type->update($validate);
        return redirect('vehicle_type');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehicle_type $vehicle_type)
    {
        $vehicle_type->delete();
        return redirect('vehicle_type');
    }
}
