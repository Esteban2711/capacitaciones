
@extends('plantilla')

@section('content')
  <main role="main">
  <div class="container my-5">
    <h1 class="text-center mb-5 display-2">Mis Capacitaciones  </h1>
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
                @foreach ($inscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->capacitacion->nombre }}</td>
                        <td>{{ $inscripcion->capacitacion->cupo }}</td>
                        <td>{{ $inscripcion->capacitacion->fecha }}</td>
                        <td>{{ $inscripcion->capacitacion->hora }}</td>
                        <td >
                            <form action="{{ route('eliminar-inscripciones',$inscripcion->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancelar Inscripcion</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</main>

@endsection

