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
    public function create(Request $req, $id,$cuatri)
    {
    $count = DB::table('calificaciones')
                ->where('id_alumno', $id)
                ->count();
    if ($count < 13) {
        DB::table('calificaciones')->insert([
            "id_alumno" => $id,
            "id_materia" => $req->input('_Asignatura'),
            "parcial" => $cuatri,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        return back()->with('Confirmacion', "Asignatura registrada correctamente");
    } else {
        return back()->with('Error', 'No se pueden agregar más de 13 registros por alumno.');
    }
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
    public function show($id,$cuatri)
    {
        $alumno=DB::table('alumnos')
        ->join('carreras','alumnos.id_carrera','=','carreras.id')
        ->where('alumnos.id',$id)
        ->first();
        $asignaturas = DB::table('materias')
        ->whereNotIn('id', function($query) use ($id) {
            $query->select('id_materia')
                  ->from('calificaciones')
                  ->where('id_alumno', $id);
        })
        ->get();
        $carreras=DB::table('carreras')->get();
        $inscripcion=DB::table('calificaciones')
        ->select('calificaciones.id as calificaciones_id',
         'materias.nombre',
         'calificaciones.calificacion1 as calificacion1',
         'calificaciones.calificacion2 as calificacion2',
         'calificaciones.calificacion3 as calificacion3',
         'calificaciones.final as final')
        ->join('materias','materias.id','=','calificaciones.id_materia')
        ->where('calificaciones.id_alumno',$id)
        ->where('calificaciones.parcial',$cuatri)
        ->get();
        $probabilidadAprobar =100;
        $t = $inscripcion->count();
        if ($t!=0){
            $min = ceil($t * 0.5);
            $reprob = $inscripcion->where('final', 0)->count();
            $aprob = $inscripcion->where('final', 1.0)->count();
            $k = $min-$aprob;
            $n = $t-$aprob-$reprob;
            $numExamenes = $n;
            $probExamen = 31 / 101;
            DB::table('alumnos')->where('id', $id)
                ->update([
                    "porcentaje"=>100,
                    "updated_at" => Carbon::now(),
                ]);
            if ($n!=0){
                
                if($k>0 && $n>$k){
                    $probabilidadAprobar = $this->coeficienteBinomial($numExamenes, $k)*pow($probExamen, $k)*pow(1 - $probExamen, $numExamenes - $k)*100;
                    DB::table('alumnos')->where('id', $id)
                    ->update([
                        "porcentaje"=>$probabilidadAprobar,
                        "updated_at" => Carbon::now(),
                    ]);
                    }
            }
            else{
                $probabilidadAprobar =100;
                DB::table('alumnos')->where('id', $id)
                ->update([
                    "porcentaje"=>$probabilidadAprobar,
                    "updated_at" => Carbon::now(),
                ]);
            }
            if($min<$reprob){
                $probabilidadAprobar =0;
                DB::table('alumnos')->where('id', $id)
                ->update([
                    "porcentaje"=>$probabilidadAprobar,
                    "updated_at" => Carbon::now(),
                ]);
            }
        }
        return view('partials.perfil_alumno',compact('alumno','carreras','id','asignaturas','inscripcion','probabilidadAprobar','cuatri'));
    }

    public function coeficienteBinomial($n, $k)
    {
        if ($k == 0 || $k == $n) {
            return 1;
        } else {
            return $this->coeficienteBinomial($n - 1, $k - 1) + $this->coeficienteBinomial($n - 1, $k);
        }
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
    public function update(Request $req, $id)
    {
    $calificacion1 = $req->input('_C1');
    $calificacion2 = $req->input('_C2');
    $calificacion3 = $req->input('_C3');

    $emptyVariables = 0;
    if (empty($calificacion1)) $emptyVariables++;
    if (empty($calificacion2)) $emptyVariables++;
    if (empty($calificacion3)) $emptyVariables++;

    if ($calificacion1 >= 7 && $calificacion2 >= 7 && $calificacion3 >= 7) {
        $final = 1;
    } elseif ($calificacion1 < 7 && $calificacion2 < 7 && $calificacion3 < 7) {
        $final = 0;
    } elseif ($calificacion1 < 7 || $calificacion2 < 7 || $calificacion3 < 7) {
        $final = 31/101;
    } else {
        $final = pow(31/101, $emptyVariables);
    }

    DB::table('calificaciones')->where('id', $id)
        ->update([
            "calificacion1" => $calificacion1,
            "calificacion2" => $calificacion2,
            "calificacion3" => $calificacion3,
            "final" => $final,
            "updated_at" => Carbon::now(),
        ]);

    return back()->with('Confirmacion', "Calificación actualizada correctamente");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(calificaciones $calificaciones)
    {
        //
    }
}
