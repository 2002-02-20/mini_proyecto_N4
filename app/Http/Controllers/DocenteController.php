<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docente = Docente::all();
        return response()->json($docente);
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
        $request->validate(['nombres' => 'required', 'apellidos' => 'required', 'email' => 'required|email|unique:docentes']);

        $docentes = Docente::create($request->all());
        return response()->json(['docentesdocentes' => $docentes]);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $docente = Docente::findOrFail($id);
        return response()->json($docente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate(['nombres' => 'required', 'apellidos' => 'required', 'email' => 'required|email|unique:docentes,email,' . $id,]);

        $docente = Docente::findOrFail($id);
        $docente->update($request->all());
        return response()->json($docente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();
        return response()->json($docente);
    }
}
