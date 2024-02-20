<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumno = Alumno::all();
        return response()->json($alumno);
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
        $request->validate(['nombres' => 'required', 'apellidos' => 'required', 'email' => 'required|emial|unique:alumno']);

        $alumno = Alumno::create($request->all());
        return response()->json(['alumno' => $alumno]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return response()->json($alumno);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $id)
    {
        $request->validate(['nombres' => 'required', 'apellidos' => 'required', 'email' => 'required|email|unique:alumnos,email,' . $id,]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->all());
        return response()->json($alumno);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        return response()->json($alumno);
    }
}
