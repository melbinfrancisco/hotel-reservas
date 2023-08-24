<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionsController extends Controller
{
    
    public function index(Request $request)
    {
        
        $buscar = $request->get('buscar');
    
        
        $habitacion = Habitacion::when($buscar, function ($query, $buscar) {
            return $query->where('numero', 'like', "%$buscar%")
                ->orWhere('tipo', 'like', "%$buscar%")
                ->orWhere('precio', 'like', "%$buscar%")
                ->orWhere('id', 'like', "%$buscar%");
        })->paginate(10);

        return view('Habitacion.Hindex')->with('habitaciones',$habitacion);

    }

    
    public function create()
    {
        return view('Habitacion.Hcreate');
    }

    
    public function store(Request $request)
    {
        // Valida los datos ingresados en el formulario
        $request->validate([
            'numero' => 'required|numeric|unique:habitacions|min:100|max:999',
            'tipo' => 'required',
            'precio' => 'required|min:500.00|max:1500.00|numeric',
        ], [
            'numero.required' => 'El campo número es obligatorio.',
            'numero.unique' => 'El número ingresado ya está en uso.',
            'numero.min' => 'El número debe ser mayor o igual a :min.',
            'numero.max' => 'El número debe ser menor o igual a :max.',
            'numero.numeric' => 'El número debe ser numérico.',
            'precio.min' => 'El precio debe ser mayor o igual a :min.',
            'precio.max' => 'El precio debe ser menor o igual a :max.',
            'tipo.required' => 'El campo tipo es obligatorio.',
            'tipo.in' => 'El tipo seleccionado no es válido.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser numérico.',
        ]);
    

        // Crea una nueva habitación y asigna los valores del formulario
        $habitacion = new Habitacion();
        $habitacion->numero = $request->numero;
        $habitacion->tipo = $request->tipo;
        $habitacion->precio = $request->precio;
        $habitacion->save();

        return redirect()->route('habitacion.index')->with('mensaje', 'Habitación agregada exitosamente');
    }

    
    public function show(string $id)
    {
        $habitacion = Habitacion::findOrfail($id);
        return view('Habitacion.Hshow' , compact('habitacion'));
    }

    
    public function edit(string $id)
    {
        $habitacion = Habitacion::findOrfail($id);
        return view('Habitacion.Hedit', compact('habitacion'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'numero' => 'required|numeric|min:100|max:999|unique:habitacions,numero,'.$id,
            'tipo' => 'required',
            'precio' => 'required|min:500.00|max:1500.00|numeric',
        ], [
            'numero.required' => 'El campo número es obligatorio.',
            'numero.unique' => 'El número ingresado ya está en uso.',
            'numero.min' => 'El número debe ser mayor o igual a :min.',
            'numero.max' => 'El número debe ser menor o igual a :max.',
            'precio.min' => 'El precio debe ser mayor o igual a :min.',
            'precio.max' => 'El precio debe ser menor o igual a :max.',
            'tipo.required' => 'El campo tipo es obligatorio.',
            'tipo.in' => 'El tipo seleccionado no es válido.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser numérico.',
        ]);

        // Ajustar el valor del precio para permitir enteros o decimales
        $precio = $request->input('precio');
        if ($precio != intval($precio)) {
        // Si el valor no es un entero, se redondea a dos decimales
        $precio = round($precio, 2);
    }

        $habitacion = Habitacion::findOrFail($id);
        $habitacion->update([
            'numero' => $request->numero,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
        ]);

        return redirect()->route('habitacion.index')->with('mensaje', 'Habitación actualizada correctamente.');
    }

    
    public function destroy($id)
    {

    $habitacion = Habitacion::findOrFail($id);

    // Eliminar las reservas relacionadas antes de eliminar la habitación
    $habitacion->reservas()->delete();

    // Ahora puedes eliminar la habitación
    $habitacion->delete();

    return redirect()->route('habitacion.index')->with('mensaje', 'Habitación eliminada correctamente');
    }
}