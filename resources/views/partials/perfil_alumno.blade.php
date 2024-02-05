@extends('layouts.template')
@section('titulo','Perfil Alumno')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class=" card card-body mt-5 mb-5">
                <div class="row">
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <ul class="list-group">
                                    <li>
                                        Matricula: {{$alumno->matricula}}
                                    </li>
                                    <li>
                                        Nombre: {{$alumno->alumnos}} {{$alumno->primer_apellido}} {{$alumno->segundo_apellido}}
                                    </li>
                                    <li>
                                        Fecha de Nacimiento: {{$alumno->fecha_nacimiento}}
                                    </li>
                                    <li>
                                        Carrera: {{$alumno->nombre}}
                                    </li>
                                    <li>
                                        Cuatrimestre: {{$alumno->cuatrimestre}}
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        @include('partials.actualizar_alumno')
                                        <button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#ActualizarAlumno">
                                             Editar Datos
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        @include('partials.registrar_asignaturas')
                                        <button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#Registrar_Asignaturas">
                                             Registrar Asignaturas
                                        </button>
                                    </div>
                                </div>
                            </li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class=" card card-body mt-5">
                <div class="row">
                    <div class="col">
                        <h1>
                            Calificaciones
                        </h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Primer Parcial</th>
                                    <th>Segundo Parcial</th>
                                    <th>Tercer Parcial</th>
                                    <th>Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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