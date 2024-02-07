<div class="modal fade" id="Registroalumno" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrar Alumno</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/alumno_store" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputMatricula" class="form-label">Matricula</label>
                        <input type="text" class="form-control" id="inputMatricula" name="_Matricula" required>
                    </div>
            
                    <div class="col-md-6">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="_Nombre" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputAP" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="inputAP" name="_AP" required>
                    </div>
            
                    <div class="col-md-6">
                        <label for="inputAM" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="inputAM" name="_AM" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputNacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="inputNacimiento" name="_Nacimiento" required>
                    </div>
            
                    <div class="col-md-6">
                        <label for="inputCarrera" class="form-label">Carrera</label>
                        <select name="_Carrera" id="inputCarrera" required>
                            <option value="" >Selecciona una opción</option>
                            @foreach($carreras as $c)
                            <option value="{{$c->id}}">{{$c->nombre}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputCuatrimestre" class="form-label">Cuatrimestre</label>
                        <select name="_Cuatrimestre" id="inputCuatrimestre" required>
                            <option value="" >Selecciona una opción</option>
                            <option value="1">Primero</option>
                            <option value="2">Segundo</option>
                            <option value="3">Tercero</option>
                            <option value="4">Cuarto</option>
                            <option value="5">Quinto</option>
                            <option value="6">Sexto</option>
                            <option value="7">Séptimo</option>
                            <option value="8">Octavo</option>
                            <option value="9">Noveno</option>
                            <option value="10">Décimo</option>
                          </select>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-save2"></i> Registrar</button>
        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-arrow-return-left"></i> Cerrar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  