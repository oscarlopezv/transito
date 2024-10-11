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
        return redirect('specialpermission');
    })->name('dashboard');

    Route::resource('/specialpermission', SpecialPermissionController::class);
    Route::post('/borrar/{special_permission}', [SpecialPermissionController::class,'borrar'])->name('borrar');


    Route::resource('/vehicle_type',VehicleTypeController::class);

    Route::resource('/document_type',DocumentTypeController::class);
    Route::resource('/documents',DocumentController::class);

    Route::resource('/user',UserController::class);

    // Route::resource('/ejecution',EjecutionController::class);
    Route::get('/ejecution',[EjecutionController::class,'index'])->name('ejecution.index');
    Route::get('/ejecution/create',[EjecutionController::class,'create'])->name('ejecution.create');
    Route::post('/ejecution',[EjecutionController::class,'store'])->name('ejecution.store');
    Route::get('/ejecution/{ejecution}/edit',[EjecutionController::class,'edit'])->name('ejecution.edit');
    Route::delete('/ejecution/{ejecution}',[EjecutionController::class,'destroy'])->name('ejecution.destroy');
    Route::post('/update',[EjecutionController::class,'update'])->name('ejecution.update');
    Route::post('/deleteFile',[EjecutionController::class,'deleteFile'])->name('deleteFile');
    
});


