@extends('layouts.template')
@section('titulo','Alumnos')
@section('contenido')

<body style="background-color:rgb(169, 207, 222);">
<div class="d-flex justify-content-center">
    <div class="card" style="max-width: 1200px;">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <nav class="navbar">
                            <div class="container">
                                <div class="search-form">
                                    <form class="d-flex" role="search" action="/busqueda" method="GET">
                                        @csrf
                                        <input class="form-control me-2 col-md-3" type="search" name="_busq" placeholder="Matricula" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit"> Buscar</button>
                                    </form>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-4 text-end">
                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#Registroalumno">
                            <i class="bi bi-pencil-square"></i> Registrar Alumno
                        </button>                  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                            <strong>Leyenda:</strong>
                            <span class="badge bg-success">Probabilidad de pasar arriba del 70%</span>
                            <span class="badge bg-info">Probabilidad de pasar entre el 70% y el 30%</span>
                            <span class="badge bg-danger">Probabilidad de pasar abajo del 30%</span>
                            <span class="badge bg-warning">Menos de 7 materias inscritas</span>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Matricula</th>
                            <th scope="col">Nombre(s)</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Cuatrimestre</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnos as $a)
                        <tr 
                        @if($a->asignaturas < 7)
                        @elseif($a->asignaturas >= 7)
                            @if($a->porcentaje > 70) class="table-success"
                            @elseif($a->porcentaje <= 70 && $a->porcentaje >= 30) class="table-info"
                            @else class="table-danger"
                            @endif
                    @endif>
                            <td scope="col">{{$a->matricula}}</td>
                            <td scope="col">{{$a->alumnos}}</td>
                            <td scope="col">{{$a->primer_apellido}}</td>
                            <td scope="col">{{$a->segundo_apellido}}</td>
                            <td scope="col">{{$a->fecha_nacimiento}}</td>
                            <td scope="col">{{$a->nombre}}</td>
                            <td scope="col">{{$a->cuatrimestre}}</td>
                            <td scope="col">
                                <a href="calificaciones/{{$a->id}}/{{$a->cuatrimestre}}">
                                    <button type="button" class="btn btn-outline-primary"><i class="bi bi-person-circle"></i> Perfil Alumno</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
@include('partials.registrar_alumno')
</body>

@endsection
