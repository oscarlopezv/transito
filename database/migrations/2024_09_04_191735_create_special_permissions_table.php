<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('special_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('placa',6);
            $table->string('lateral',6)->nullable();
            $table->unsignedBigInteger('vehicle_type_id');
            $table->string('permiso');
            $table->timestamps();
            
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_permissions');
    }
};
