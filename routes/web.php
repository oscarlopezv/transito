<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\EjecutionController;
use App\Http\Controllers\SpecialPermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/specialpermission', SpecialPermissionController::class)->names("permission");

    Route::resource('/vehicle_type',VehicleTypeController::class);

    Route::resource('/document_type',DocumentTypeController::class);
    Route::resource('/document',DocumentController::class);

    Route::resource('/user',UserController::class);

    Route::resource('/ejecution',EjecutionController::class);
    Route::post('/deleteFile',[EjecutionController::class,'deleteFile'])->name('deleteFile');
    
});


