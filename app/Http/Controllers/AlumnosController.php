<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use App\Http\Requests\StorealumnosRequest;
use App\Http\Requests\UpdatealumnosRequest;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class AlumnosController extends Controller
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
    public function store(Request $req)
    {
        DB::table('alumnos')->insert([
            "matricula"=>$req->input('_Matricula'),
            "alumnos"=>$req->input('_Nombre'),
            "primer_apellido"=>$req->input('_AP'),
            "segundo_apellido"=>$req->input('_AM'),
            "fecha_nacimiento"=>$req->input('_Nacimiento'),
            "cuatrimestre"=>$req->input('_Cuatrimestre'),
            "id_carrera"=>$req->input('_Carrera'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return back()->with('Confirmacion',"Alumno registrado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $alumnos=DB::table('alumnos')
        ->join('carreras','alumnos.id_carrera','=','carreras.id')
        ->get();
        $carreras=DB::table('carreras')->get();
        return view('partials.alumnos',compact('carreras','alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumnos $alumnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        DB::table('alumnos')->where('id',$id)
            ->update([
            "matricula"=>$req->input('_Matricula'),
            "alumnos"=>$req->input('_Nombre'),
            "primer_apellido"=>$req->input('_AP'),
            "segundo_apellido"=>$req->input('_AM'),
            "fecha_nacimiento"=>$req->input('_Nacimiento'),
            "cuatrimestre"=>$req->input('_Cuatrimestre'),
            "id_carrera"=>$req->input('_Carrera'),
            "updated_at"=>Carbon::now(),
        ]);
        return back()->with('Confirmacion',"Alumno registrado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alumnos $alumnos)
    {
        //
    }
}
