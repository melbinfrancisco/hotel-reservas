<?php

namespace App\Http\Controllers;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ReservasController extends Controller
{
    
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
    
        
        $reserva = Reserva::when($buscar, function ($query, $buscar) {
            return $query->where('fecha_entrada', 'like', "%$buscar%")
                ->orWhere('fecha_salida', 'like', "%$buscar%")
                ->orWhere('habitacion_id', 'like', "%$buscar%")
                ->orWhere('huesped_id', 'like', "%$buscar%")
                ->orWhere('numero_de_huespedes', 'like', "%$buscar%")
                ->orWhere('id', 'like', "%$buscar%");
        })->paginate(10);

        return view('Reserva.Rindex')->with('reservas',$reserva);
    }

   
    public function create()
    {
        return view('Reserva.Rcreate');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after_or_equal:fecha_entrada',
            'numero_de_huespedes' => 'required|integer|max:5', 
            'habitacion_id' => [
                'required',
                Rule::exists('habitacions', 'id')->where(function ($query) {
                }),
                function ($attribute, $value, $fail) {
                    $existingReservation = DB::table('reservas')
                        ->where('habitacion_id', $value)
                        ->where('fecha_salida', '>=', request('fecha_entrada'))
                        ->where('fecha_entrada', '<=', request('fecha_salida'))
                        ->first();
            
                    if ($existingReservation) {
                        $fail('La habitación ya está reservada en las fechas que indicaste.');
                    }
                },
            ],
            'huesped_id' => [
                'required',
                Rule::exists('huespeds', 'id')->where(function ($query) {
                    
                }),
                function ($attribute, $value, $fail) {
                    $existingReservation = DB::table('reservas')
                        ->where('huesped_id', $value)
                        ->where('fecha_salida', '>=', request('fecha_entrada'))
                        ->where('fecha_entrada', '<=', request('fecha_salida'))
                        ->first();
            
                    if ($existingReservation) {
                        $fail('El huésped ya tiene una reserva en las fechas que indicaste.');
                    }
                },
            ],
        ], [
            'fecha_entrada.required' => 'El campo es obligatorio.',
            'fecha_salida.required' => 'El campo es obligatorio.',
            'fecha_salida.after_or_equal' => 'La fecha de salida debe ser igual o posterior a la fecha de entrada.',
            'numero_de_huespedes.max' => 'Número máximo de huéspedes es 5.',
            'numero_de_huespedes.required' => 'El campo es obligatorio.',
            'habitacion_id.required' => 'El campo es obligatorio.',
            'habitacion_id.exists' => 'El ID de habitación no existe.',
            'huesped_id.required' => 'El ID de huésped no existe.',
            'huesped_id.exists' => 'El ID de huésped no existe.',
        ]);
        
                
    
        // Guardar la reserva
        $reserva = new Reserva();
        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->huesped_id = $request->huesped_id;
        $reserva->numero_de_huespedes = $request->numero_de_huespedes;
        $reserva->save();
    
        return redirect()->route('reserva.index')->with('mensaje', 'Reserva creada exitosamente');
    }

    
    public function show(string $id)
    {
        $reserva = Reserva::findOrfail($id);
        return view('Reserva.Rshow' , compact('reserva'));
    }

    
    public function edit(string $id)
    {
        $reserva = Reserva::findOrfail($id);
        return view('Reserva.Redit', compact('reserva'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after_or_equal:fecha_entrada',
            'numero_de_huespedes' => 'required|integer|max:5', 

            'habitacion_id' => [
                'required',
                Rule::exists('habitacions', 'id')->where(function ($query) {}),
                function ($attribute, $value, $fail) use ($request, $id) {
                    $existingHabitacionId = DB::table('reservas')
                        ->where('id', '<>', $id) // Excluir la reserva actual
                        ->where('habitacion_id', $request->habitacion_id)
                        ->where('fecha_salida', '>=', $request->fecha_entrada)
                        ->where('fecha_entrada', '<=', $request->fecha_salida)
                        ->first();

                        if ($existingHabitacionId) {
                            $fail('La habitación ya está reservada en las fechas que indicaste.');
                        }
                },
            ],
            'huesped_id' => [
                'required',
                Rule::exists('huespeds', 'id')->where(function ($query) {}),
                function ($attribute, $value, $fail) use ($request, $id) {
                    $existingReservation = DB::table('reservas')
                        ->where('huesped_id', $value)
                        ->where('fecha_salida', '>=', $request->fecha_entrada)
                        ->where('fecha_entrada', '<=', $request->fecha_salida)
                        ->where('id', '<>', $id) // Excluir la reserva actual
                        ->first();
            
                    if ($existingReservation) {
                        $fail('El huésped ya tiene una reserva en las fechas que indicaste.');
                    }
                },
            ],

        ], [
            'fecha_entrada.required' => 'El campo es obligatorio.',
            'fecha_salida.required' => 'El campo es obligatorio.',
            'fecha_salida.after_or_equal' => 'La fecha de salida debe ser igual o posterior a la fecha de entrada.',
            'numero_de_huespedes.max' => 'Número máximo de huéspedes es 5.',
            'numero_de_huespedes.required' => 'El campo es obligatorio.',
            'habitacion_id.required' => 'El campo es obligatorio.',
            'habitacion_id.exists' => 'El ID de habitación no existe.',
            'huesped_id.required' => 'El ID de huésped no existe.',
            'huesped_id.exists' => 'El ID de huésped no existe.',
        ]);

        $reserva = Reserva::findOrFail($id);
        $reserva->update([
            'fecha_entrada' => $request->fecha_entrada,
            'fecha_salida' => $request->fecha_salida,
            'habitacion_id' => $request->habitacion_id,
            'huesped_id' => $request->huesped_id,
            'numero_de_huespedes' => $request->numero_de_huespedes,
        ]);

        return redirect()->route('reserva.index')->with('mensaje', 'Habitación actualizada correctamente.');
    }

   
    public function destroy(string $id)
    {
        $reserva = Reserva::findOrFail($id);

    $reserva->delete();

    return redirect()->route('reserva.index')->with('mensaje', 'Reserva eliminada correctamente');
    }
}
