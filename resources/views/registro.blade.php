@php
$errors = $errors ?? '';

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Capacitaciones S.A.S</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center mt-5">
        <h1 class="display-3">Capacitaciones con Cupos <label class="text-danger">limitados</label> </h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-header  display-4">Registro</div>
                <div class="card-body">
                <form method="POST" action="{{ route('crear-registro') }}">
                                    @csrf
                        <div class="form-group">
                            <label for="nombre">nombre</label>
                            <input type="nombre" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="correo_electronico">Correo electronico </label>
                            <input type="correo" class="form-control" id="correo_electronico" name="correo_electronico" required>
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        </div>

                        @if($errors)
                                @if($errors->any())
                                <div>
                                    <label class="text-danger">{{$errors->first()}}</label>
                                </div>
                            @endif
                        @endif
                        <button type="submit" class="btn btn-success boton">Registrarse</button>
                        <a href="{{route('login')}}" class="btn btn-success boton">Iniciar Sesion</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>