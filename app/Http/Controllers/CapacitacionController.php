<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Capacitacion;
use App\Http\Requests\PdfRequest;
use Illuminate\Support\Facades\Auth;


class CapacitacionController extends Controller
{


    public function index(Request $request)
    {

        $capacitaciones = Capacitacion::all();
        $userId = Auth::id();
        
        if($request->input('parametro')){ 
        $administrador = $request->input('parametro');
        return view('administracion',['administrador' => $administrador] ,compact('capacitaciones','userId'));
         }
       
        return view('administracion',compact('capacitaciones','userId'));
    }


    public function store(Request $request)
    {
      

        $capacitacion = new Capacitacion();

        $capacitacion->nombre = $request->nombre;
        $capacitacion->cupo = $request->cupo;
        $capacitacion->fecha = $request->fecha;
        $capacitacion->hora = $request->hora;
       
      

        $capacitacion->save();
        $administrador = 1;

        return redirect()->route('administrar' ,['parametro' =>1])
            ->with('success', 'Se ha creado la capacitacion.');
    }
    

 
    
}
