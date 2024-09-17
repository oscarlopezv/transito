<?php

namespace Database\Seeders;

use App\Models\vehicle_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        vehicle_type::create(['name'=>'Taxi']);
        vehicle_type::create(['name'=>'Moto']);
        vehicle_type::create(['name'=>'Vehiculo']);
    }
}
