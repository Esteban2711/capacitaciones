@php
$administrador = $administrador ?? '';
@endphp

@extends('plantilla')

@section('content')
  <main role="main">
  <div class="container my-5">
    <h1 class="text-center mb-5 display-2">Capacitaciones Disponibles </h1>
    @if($administrador)
      <div class="row justify-content-center">
        <div class="col-md-6 ml-md-5">
          <button type="button" class="btn btn-primary  col-md-10" data-toggle="modal" data-target="#modal-crear">
            Crear Capacitacion
          </button>
        </div>
      </div>
    @endif
  </div>

  <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>Nombre de la capacitacion</th>
                    <th>cupos</th>
                    <th>fecha</th>
                    <th>hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($capacitaciones as $capacitacion)
                    <tr>
                        <td>{{ $capacitacion->nombre }}</td>
                        <td>{{ $capacitacion->cupo }}</td>
                        <td>{{ $capacitacion->fecha }}</td>
                        <td>{{ $capacitacion->hora }}</td>
                        <td >
                            <form action="{{ route('inscripciones-capacitaciones') }}" method="POST" class="d-inline">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="capacitacion_id" value="{{$capacitacion->id}}">
                                <input type="hidden" name="usuario_id" value="{{$userId}}">
                                <button type="submit" class="btn btn-success">Inscribirse</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</main>


<div class="modal fade" id="modal-crear" tabindex="-1" role="dialog" aria-labelledby="modal-crear-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="crearCapacitacion" action="{{ route('crear') }}" method="POST" onsubmit="return validarFormulario()" enctype="multipart/form-data">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="modal-subir-archivo-label">Crear Capacitacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="form-group">
                <label for="nombre">Nombre de la capacitacion:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
        <div class="form-group">
                <label for="cupo">cupo:</label>
                <input type="number" class="form-control" id="cupo" name="cupo" required>
            </div>
            <div class="form-group">
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" class="form-control">
  </div>
  <div class="form-group">
    <label for="hora">Hora:</label>
    <input type="time" name="hora" id="hora" class="form-control">
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Crear</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
function validarFormulario() {
    let fecha = document.getElementById('fecha').value;
    let hora = document.getElementById('hora').value;

    let fechaHora = new Date(fecha + 'T' + hora);

    let dia = fechaHora.getDay();
    if (dia == 0 || dia == 6) {
        alert('La capacitación debe crearse de (lunes a viernes)');
        return false;
    }

    let horaInicio = new Date(fecha + 'T10:00:00');
    let horaFin = new Date(fecha + 'T22:00:00');
    if (fechaHora < horaInicio || fechaHora > horaFin) {
        alert('La capacitación debe realizarse entre las 10:00 AM y las 10:00 PM');
        return false;
    }
    return true;
}
</script>

@endsection



