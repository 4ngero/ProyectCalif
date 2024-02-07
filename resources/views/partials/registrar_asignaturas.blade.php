<div class="modal fade" id="Registrar_Asignaturas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrar Asignatura</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/alumno_create/{{$id}}/{{$cuatri}}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputAsignatura">Asignatura:</label>
                        <select name="_Asignatura" id="inputAsignatura">
                            <option value="" >Selecciona una opción</option>
                            @foreach($asignaturas as $as)
                            <option value="{{$as->id}}">{{$as->nombre}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  