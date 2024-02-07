<div class="modal fade" id="ActualizarAlumno" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrar Alumno</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/alumno_update/{{$id}}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputMatricula" class="form-label">Matricula</label>
                        <input type="text" class="form-control" id="inputMatricula" name="_Matricula" value="{{$alumno->matricula}}">
                    </div>
            
                    <div class="col-md-6">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="_Nombre" value="{{$alumno->alumnos}}">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputAP" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="inputAP" name="_AP" value="{{$alumno->primer_apellido}}">
                    </div>
            
                    <div class="col-md-6">
                        <label for="inputAM" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="inputAM" name="_AM" value="{{$alumno->segundo_apellido}}">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputNacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="inputNacimiento" name="_Nacimiento" value="{{$alumno->fecha_nacimiento}}">
                    </div>
            
                    <div class="col-md-6">
                        <label for="inputCarrera" class="form-label">Carrera</label>
                        <select name="_Carrera" id="inputCarrera">
                            <option value="" >Selecciona una opción</option>
                            @foreach($carreras as $c)
                            <option value="{{$c->id}}" {{ $c->nombre == $alumno->nombre ? 'selected' : '' }}>{{$c->nombre}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputCuatrimestre" class="form-label">Cuatrimestre</label>
                        <select name="_Cuatrimestre" id="inputCuatrimestre">
                            <option value="" >Selecciona una opción</option>
                            <option value="1" {{ 1 == $alumno->cuatrimestre ? 'selected' : '' }}>Primero</option>
                            <option value="2" {{ 2 == $alumno->cuatrimestre ? 'selected' : '' }}>Segundo</option>
                            <option value="3" {{ 3 == $alumno->cuatrimestre ? 'selected' : '' }}>Tercero</option>
                            <option value="4" {{ 4 == $alumno->cuatrimestre ? 'selected' : '' }}>Cuarto</option>
                            <option value="5" {{ 5 == $alumno->cuatrimestre ? 'selected' : '' }}>Quinto</option>
                            <option value="6" {{ 6 == $alumno->cuatrimestre ? 'selected' : '' }}>Sexto</option>
                            <option value="7" {{ 7 == $alumno->cuatrimestre ? 'selected' : '' }}>Séptimo</option>
                            <option value="8" {{ 8 == $alumno->cuatrimestre ? 'selected' : '' }}>Octavo</option>
                            <option value="9" {{ 9 == $alumno->cuatrimestre ? 'selected' : '' }}>Noveno</option>
                            <option value="10" {{ 10 == $alumno->cuatrimestre ? 'selected' : '' }}>Décimo</option>
                          </select>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-arrow-return-left"></i> Cerrar</button>
        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-repeat"></i> Actualizar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  