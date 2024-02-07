@extends('layouts.template')
@section('titulo','Perfil Alumno')
@section('contenido')
<body style="background-color:rgb(169, 182, 187);">
<div class="container">
    <div class="row">   
        <div class="col-3">
            <div class="card card-body mt-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <ul class="list-group list-group-flush">
                            <div class="text-center mb-3">
                                <img src="https://www.maesedavinci.cl/wp-content/uploads/2020/05/alumno1.png" alt="Imagen de perfil" class="img-fluid rounded-circle mx-auto" style="width: 150px;">
                            </div>
                            <hr>
                            <li class="list-group-item">
                                <ul class="list-group" style="list-style-type: none;">
                                    <li>
                                        <strong>Matricula:</strong> {{$alumno->matricula}}
                                    </li>
                                    <li>
                                        <strong>Nombre:</strong> {{$alumno->alumnos}} {{$alumno->primer_apellido}} {{$alumno->segundo_apellido}}
                                    </li>
                                    <li>
                                        <strong>Fecha de Nacimiento:</strong> {{$alumno->fecha_nacimiento}}
                                    </li>
                                    <li>
                                        <strong>Carrera:</strong> {{$alumno->nombre}}
                                    </li>
                                    <li>
                                        <strong>Cuatrimestre:</strong> {{$alumno->cuatrimestre}}
                                    </li>
                                </ul>                                
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        @include('partials.actualizar_alumno')
                                        <button type="button" class="btn btn-outline-warning mb-2" data-bs-toggle="modal" data-bs-target="#ActualizarAlumno">
                                            <i class="bi bi-journal-text"></i> Editar Datos
                                        </button>
                                    </div>
                                    <div class="col">
                                        @include('partials.registrar_asignaturas')
                                        <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#Registrar_Asignaturas">
                                            <i class="bi bi-pencil-square"></i> Asignaturas
                                        </button>
                                    </div>
                                </div>
                            </li>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card card-body mt-5"> 
                <div class="row">
                    <div class="col">
                        <h1 class="text-center">
                            Calificaciones
                        </h1>
                        <hr>
                        <table class="table"> 
                            <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Primer Parcial</th>
                                    <th>Segundo Parcial</th>
                                    <th>Tercer Parcial</th>
                                    <th>Probabilidad de Pasar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inscripcion as $ins)
                                <tr>
                                    <form action="/calificaciones/update/{{$ins->calificaciones_id}}" method="POST">
                                    @csrf
                                    <td>{{$ins->nombre}}</td>
                                    <td><input type="text" class="form-control" name="_C1" value="{{$ins->calificacion1}}"></td>
                                    <td><input type="text" class="form-control" name="_C2" value="{{$ins->calificacion2}}"></td>
                                    <td><input type="text" class="form-control" name="_C3" value="{{$ins->calificacion3}}"></td>
                                    <td>
                                        @if($ins->calificacion1 !== null && $ins->calificacion2 !== null && $ins->calificacion3 !== null)
                                            <input type="text" class="form-control" name="_C4" value="{{ $ins->final == 1 ? '100%' : ($ins->final == 0 ? '0%' : 'Presentar Final')}}" disabled>
                                        @else
                                        @php
                                            $numNulls = ($ins->calificacion1 === null ? 1 : 0) + ($ins->calificacion2 === null ? 1 : 0) + ($ins->calificacion3 === null ? 1 : 0);
                                            $probabilidad = pow(31 / 101, $numNulls);
                                        @endphp
                                        <input type="text" class="form-control" name="_C4" value="{{ number_format($probabilidad * 100, 2) }}%" disabled>
                                        @endif
                                    </td>
                                    <td style="width: 150px;"><button type="submit" class="btn btn-outline-primary"><i class="bi bi-arrow-repeat"> Actualizar</i></button></td>
                                    </form>
                                </tr>
                                @endforeach
                                <tr style="border-top: 1px solid black;">
                                    <td></td>
                                    <td colspan="3" class="text-end"><b>Probabilidad de pasar el cuatrimestre:</b></td>
                                    <td><input type="text" class="form-control" name="_C4" value="{{ number_format($probabilidadAprobar, 2) }} %" disabled></td>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
