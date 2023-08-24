<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// INDEX
    //Habitaciones
Route::get('/habitaciones',[HabitacionsController::class,'index'])->name('habitacion.index');

    //Huespedes
Route::get('/huespedes',[HuespedsController::class,'index'])->name('huesped.index');

    //Reservas
Route::get('/reservas',[ReservasController::class,'index'])->name('reserva.index');


// SHOW
    //Habitaciones
Route::get('/habitaciones/{id}/show',[HabitacionsController::class,'show'])->where('id','[0-9]+')->name('habitacion.show');

    //Huespedes
Route::get('/huespedes/{id}/show',[HuespedsController::class,'show'])->where('id','[0-9]+')->name('huesped.show');

    //Reservas
Route::get('/reservas/{id}/show',[ReservasController::class,'show'])->where('id','[0-9]+')->name('reserva.show');

// CREATE Y STORE
    //Habitaciones
Route::get('/habitaciones/crear',[HabitacionsController::class,'create'])->name('habitacion.crear');
Route::post('/habitaciones/crear',[HabitacionsController::class,'store'])->name('habitacion.guardar');

    //Huespedes
Route::get('/huespedes/crear',[HuespedsController::class,'create'])->name('huesped.crear');
Route::post('/huespedes/crear',[HuespedsController::class,'store'])->name('huesped.guardar');

    //Reservas
Route::get('/reservas/crear',[ReservasController::class,'create'])->name('reserva.crear');
Route::post('/reservas/crear',[ReservasController::class,'store'])->name('reserva.guardar');

// EDIT
    //Habitaciones
Route::get('/habitaciones/{id}/editar',[HabitacionsController::class,'edit'])->whereNumber('id')->name('habitacion.editar');
Route::put('/habitaciones/{id}/editar',[HabitacionsController::class,'update'])->whereNumber('id')->name('habitacion.update');

    //Huespedes
Route::get('/huespedes/{id}/editar',[HuespedsController::class,'edit'])->whereNumber('id')->name('huesped.editar');
Route::put('/huespedes/{id}/editar',[HuespedsController::class,'update'])->whereNumber('id')->name('huesped.update');

    //Reservas
Route::get('/reservas/{id}/editar',[ReservasController::class,'edit'])->whereNumber('id')->name('reserva.editar');
Route::put('/reservas/{id}/editar',[ReservasController::class,'update'])->whereNumber('id')->name('reserva.update');

//DELETE
    //Habitaciones
Route::delete('/habitaciones/{id}/borrar',[HabitacionsController::class,'destroy'])->whereNumber('id')->name('habitacion.borrar');

    //Huespedes
Route::delete('/huespedes/{id}/borrar',[HuespedsController::class,'destroy'])->whereNumber('id')->name('huesped.borrar');

    //Reservas
Route::delete('/reservas/{id}/borrar',[ReservasController::class,'destroy'])->whereNumber('id')->name('reserva.borrar');


