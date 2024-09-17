<?php

namespace Database\Seeders;

use App\Models\document_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        document_type::create(['name'=>'Acuerdos']);
        document_type::create(['name'=>'Convenios']);
        document_type::create(['name'=>'Decretos']);
        document_type::create(['name'=>'Estudios']);
        document_type::create(['name'=>'Leyes']);
        document_type::create(['name'=>'Manuales']);
        document_type::create(['name'=>'Ordenanzas']);
        document_type::create(['name'=>'Publicaciones']);
        document_type::create(['name'=>'Resoluciones']);
        document_type::create(['name'=>'Sentencias']);
    }
}
