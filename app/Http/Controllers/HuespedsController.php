<?php

namespace App\Http\Controllers;
use App\Models\Huesped;
use Illuminate\Http\Request;

class HuespedsController extends Controller
{
    
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
    
        
        $huesped = Huesped::when($buscar, function ($query, $buscar) {
            return $query->where('nombre', 'like', "%$buscar%")
                ->orWhere('apellido', 'like', "%$buscar%")
                ->orWhere('correo_electronico', 'like', "%$buscar%")
                ->orWhere('telefono', 'like', "%$buscar%")
                ->orWhere('id', 'like', "%$buscar%");
        })->paginate(10);

        return view('Huesped.HUindex')->with('huespedes',$huesped);
    }

    
    public function create()
    {
        return view('Huesped.HUcreate');
    }

    
    public function store(Request $request)
    {
        // Valida los datos ingresados en el formulario
        $request->validate([
            'nombre' => 'required|regex:/^[A-ZÁÉÍÓÚÑ][a-záéíóúñ\s]+$/',
            'apellido' => 'required|regex:/^[A-ZÁÉÍÓÚÑ][a-záéíóúñ\s]+$/',
            'correo_electronico' => 'required|unique:huespeds|email',
            'telefono' => 'required|unique:huespeds|numeric|digits:8',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.regex' => 'El nombre debe comenzar con mayúscula y luego puede contener letras y espacios.',
            'apellido.regex' => 'El apellido debe comenzar con mayúscula y luego puede contener letras y espacios.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'correo_electronico.required' => 'El campo correo electrónico es obligatorio.',
            'correo_electronico.unique' => 'El correo electrónico ya está registrado.',
            'correo_electronico.email' => 'El correo electrónico debe ser una dirección válida.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.numeric' => 'El teléfono debe ser numérico.',
            'telefono.digits' => 'El teléfono debe tener 8 dígitos.',
            'telefono.unique' => 'El teléfono ingresado ya está en uso.'
        ]);
    

        // Crea una nueva habitación y asigna los valores del formulario
        $huesped = new Huesped();
        $huesped->nombre = $request->nombre;
        $huesped->apellido = $request->apellido;
        $huesped->correo_electronico = $request->correo_electronico;
        $huesped->telefono = $request->telefono;
        $huesped->save();

        return redirect()->route('huesped.index')->with('mensaje', 'Huesped agregado exitosamente');
    }

   
    public function show(string $id)
    {
        $huesped = Huesped::findOrfail($id);
        return view('Huesped.HUshow' , compact('huesped'));
    }

    
    public function edit(string $id)
    {
        $huesped = Huesped::findOrfail($id);
        return view('Huesped.HUedit', compact('huesped'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[A-ZÁÉÍÓÚÑ][a-záéíóúñ\s]+$/',
            'apellido' => 'required|regex:/^[A-ZÁÉÍÓÚÑ][a-záéíóúñ\s]+$/',
            'correo_electronico' => 'required|email|unique:huespeds,correo_electronico,' . $id,
            'telefono' => 'required|numeric|digits:8|unique:huespeds,telefono,' . $id,
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.regex' => 'El nombre debe comenzar con mayúscula y luego puede contener letras y espacios.',
            'apellido.regex' => 'El apellido debe comenzar con mayúscula y luego puede contener letras y espacios.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'correo_electronico.required' => 'El campo correo electrónico es obligatorio.',
            'correo_electronico.unique' => 'El correo electrónico ya está registrado.',
            'correo_electronico.email' => 'El correo electrónico debe ser una dirección válida.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.numeric' => 'El teléfono debe ser numérico.',
            'telefono.unique' => 'El teléfono ingresado ya está registrado.',
            'telefono.digits' => 'El teléfono debe tener 8 dígitos.',
        ]);

        $huesped = Huesped::findOrFail($id);
        $huesped->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo_electronico' => $request->correo_electronico,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('huesped.index')->with('mensaje', 'Habitación actualizada correctamente.');
    }

    
    public function destroy(string $id)
    {
        $huesped = Huesped::findOrFail($id);

    // Eliminar las reservas relacionadas antes de eliminar la habitación
    $huesped->reservas()->delete();

    // Aquí se elimina el huésped
    $huesped->delete();

    return redirect()->route('huesped.index')->with('mensaje', 'Huésped eliminado correctamente');
    }
}
