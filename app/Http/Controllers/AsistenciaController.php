<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencia = Asistencia::all();
        return response()->json($asistencia);
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
        $request->validate([
            'matricula_id' => 'required',
            'date' => 'required|date',
            'asistencia' => 'required|in:A,T,F',
        ]);

        // Crea un nuevo registro de asistencia
        $asistencia = Asistencia::create([
            'enroll_id' => $request->enroll_id,
            'date' => Carbon::now(),      
            'attendance' => $request->attendance,
        ]);

        return response()->json(['message' => 'Asistencia registrada correctamente', 'data' => $asistencia], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $asistencia = Asistencia::findOrFail($id);
        return response()->json($asistencia);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'matricula_id' => 'required',
            'date' => 'required|date',
            'asistencia' => 'required|in:A,T,F',

        ]);

        $asistencia = Asistencia::findOrFail($id);
        $asistencia->update($request->all());
        return response()->json($asistencia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();
        return response()->json($asistencia);
    }
}
