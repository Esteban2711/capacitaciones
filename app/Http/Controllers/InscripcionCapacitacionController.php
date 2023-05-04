<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InscripcionCapacitacion;
use Illuminate\Support\Facades\Auth;


class InscripcionCapacitacionController extends Controller
{


      public function index()
    {

        $user_id = Auth::id(); 
        $inscripciones = InscripcionCapacitacion::where('usuario_id', $user_id)->get(); 

        return view('mis-capacitaciones', compact('inscripciones'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'capacitacion_id' => 'required|exists:capacitaciones,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $inscripcion = new InscripcionCapacitacion();
        $inscripcion->capacitacion_id = $request->capacitacion_id;
        $inscripcion->usuario_id = $request->usuario_id;
        $inscripcion->save();

        return redirect()->back()->with('success', 'Inscripción realizada correctamente.');
    }


     public function destroy($id)
    {
        $archivo = InscripcionCapacitacion::findOrFail($id);
        $archivo->delete();

        return redirect()->route('mis-capacitaciones');
    }



}
