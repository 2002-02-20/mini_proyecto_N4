<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matricula = Matricula::all();
        return response()->json($matricula);
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
            'curso_id' => 'required',
            'alumno_id' => 'required',
        ]);

        $matricula = Matricula::create($request->all());
        return response()->json(['matriculas' => $matricula,] );
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $matricula = Matricula::findOrFail($id);
        return response()->json($matricula);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'curso_id' => 'required',
            'alumno_id' => 'required',

        ]);

        $matricula = Matricula::findOrFail($id);
        $matricula->update($request->all());
        return response()->json($matricula);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();
        return response()->json($matricula);
    }
}
