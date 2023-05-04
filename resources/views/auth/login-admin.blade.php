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
<a href="{{route('login')}}" class="  btn btn-success"> <label>usuarios</label></a>
    <div class="d-flex justify-content-center mt-5">
        <h1 class="display-3">Capacitaciones  <label class="text-danger">S.A.S</label> </h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-header text-center display-4">Iniciar sesión Administracion</div>
                <div class="card-body">
                <form method="POST" action="{{ route('iniciar-admin') }}">
                                    @csrf
                        <div class="form-group">
                            <label for="correo_electronico">Correo electronico</label>
                            <input type="usuario" class="form-control" id="correo_electronico" name="correo_electronico" required>
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
                        <button type="submit" class="btn btn-success boton">Iniciar sesión</button>
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