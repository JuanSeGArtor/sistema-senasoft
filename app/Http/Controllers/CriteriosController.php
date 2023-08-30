<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Sondeo;

class CriteriosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $busqueda = $request->buscar;
         $sexo = $request->sexo;
         $etnia = $request->etnia;
         $edad = $request->edad;
         $estrato = $request->estrato;
         $discapacidad = $request->discapacidad;
         $educacion = $request->educacion;
     
         $sondeos = Sondeo::whereHas('criterio', function ($query) use ($busqueda, $etnia, $sexo, $edad, $estrato, $discapacidad, $educacion) {
     
             if ($busqueda !== null) {
                 $query->where('titulo', 'like', '%' . $busqueda . '%');
             }
     
             if ($sexo !== null) {
                 $query->where('sexo', 'like', '%' . $sexo . '%');
             }
     
             if ($etnia !== null) {
                 $query->where('etnia', 'like', '%' . $etnia . '%');
             }
     
             if ($edad !== null) {
                 $query->where('edad', 'like', '%' . $edad . '%');
             }
     
             if ($estrato !== null) {
                 $query->where('estrato', 'like', '%' . $estrato . '%');
             }
     
             if ($discapacidad !== null) {
                 $query->where('discapacidad', 'like', '%' . $discapacidad . '%');
             }
     
             if ($educacion !== null) { // Corregido: Cambiado de $nivelEducativo a $educacion
                 $query->where('nivelEducativo', 'like', '%' . $educacion . '%');
             }
         })->get(); // Corregido: Agregado el método ->get() al final de la consulta
     
         return view('sondeos.index', ['sondeos' => $sondeos]);
     }
     



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombreCriterio' => 'required|string',
            'condicionCriterio' => 'required|string',
            'valor1Criterio' => 'required',
            'valor2Criterio' => 'nullable',
        ]);

        // Crear el registro del criterio
        $criterio = Criterio::create([
            'nombre' => $request->input('nombreCriterio'),
            'condicion' => $request->input('condicionCriterio'),
            'valor1' => $request->input('valor1Criterio'),
            'valor2' => $request->input('valor2Criterio'),
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}