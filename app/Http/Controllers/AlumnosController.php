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
        $alumnos = DB::table('alumnos')
        ->select(
            'alumnos.id as id',
            'alumnos.matricula as matricula',
            'alumnos.alumnos as alumnos',
            'alumnos.primer_apellido as primer_apellido',
            'alumnos.segundo_apellido as segundo_apellido',
            'alumnos.fecha_nacimiento as fecha_nacimiento',
            'alumnos.cuatrimestre as cuatrimestre',
            'alumnos.porcentaje as porcentaje',
            'carreras.nombre as nombre',
            DB::raw('(SELECT COUNT(*) FROM calificaciones WHERE calificaciones.id_alumno = alumnos.id) as asignaturas')
        )
        ->join('carreras', 'carreras.id', '=', 'alumnos.id_carrera')
        ->get();
        
        $carreras=DB::table('carreras')->get();
        return view('partials.alumnos',compact('carreras','alumnos'));
    }

    public function search(Request $req)
    {
        $matricula=$req->input('_busq');
        if(empty($matricula)) {
            return redirect('/');
        }
        $alumnos = DB::table('alumnos')->where('matricula',$matricula)
        ->select(
            'alumnos.id as id',
            'alumnos.matricula as matricula',
            'alumnos.alumnos as alumnos',
            'alumnos.primer_apellido as primer_apellido',
            'alumnos.segundo_apellido as segundo_apellido',
            'alumnos.fecha_nacimiento as fecha_nacimiento',
            'alumnos.cuatrimestre as cuatrimestre',
            'alumnos.porcentaje as porcentaje',
            'carreras.nombre as nombre',
            DB::raw('(SELECT COUNT(*) FROM calificaciones WHERE calificaciones.id_alumno = alumnos.id) as asignaturas')
        )
        ->join('carreras', 'carreras.id', '=', 'alumnos.id_carrera')
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
        return back()->with('Confirmacion',"Alumno actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alumnos $alumnos)
    {
        //
    }
}
