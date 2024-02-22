<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materia = Curso::all();
        return response()->json($materia);
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
            'curso' => 'required',
           
        ]);

        $curso = Curso::create($request->all());
        return response()->json($curso);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $curso = Curso::findOrFail($id);
        return response()->json($curso);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'curso' => 'required',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->update($request->all());
        return response()->json($curso);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return 'El registro se borro correctamente';
    }
}
