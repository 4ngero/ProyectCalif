<?php

namespace App\Http\Controllers;

use App\Models\calificaciones;
use App\Http\Requests\StorecalificacionesRequest;
use App\Http\Requests\UpdatecalificacionesRequest;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorecalificacionesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumno=DB::table('alumnos')
        ->join('carreras','alumnos.id_carrera','=','carreras.id')
        ->where('alumnos.id',$id)
        ->first();
        $carreras=DB::table('carreras')->get();
        return view('partials.perfil_alumno',compact('alumno','carreras','id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(calificaciones $calificaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecalificacionesRequest $request, calificaciones $calificaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(calificaciones $calificaciones)
    {
        //
    }
}
