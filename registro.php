<?php
    include('usuarios.php');
    $usuario = new usuarios;
    if (isset($_POST['registrar'])){
        $request = array(
            "identificacion" => $_POST['identificacion'],
            "apellidos" => $_POST['apellidos'],
            "nombres" => $_POST['nombres'],
            "fecha_nacimiento" => $_POST['fecha_nacimiento'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono']
        );
        if($usuario -> crear_usuario($request)){
            echo('usuario creado');
        } else {
            echo('error de creacion');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="index.html"><img src="logo_princ.jpg" alt="" width="100px"></a>
            </div>
            <div class="col"></div>
            <div class="col"><p class="fs-5 titulo">Sebastian Ballesteros Martinez</p></div>
            <div class="col"></div>
            <div class="col" >
                <a href="registro.php"><button type="button" class="btn btn-secondary">Registro</button></a>
                <a href="consulta.php"><button type="button" class="btn btn-secondary">Ver usuarios</button></a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="" method='post'>
            <table>
                <tr>
                    <div class="mb-3">
                        <td><label for="identificacion" class="form-label">Identificacíon</label></td>
                        <td><input type="text" class="form-text" name="identificacion"></td>
                    </div>
                </tr>
                <tr>
                    <div class="mb-3">
                        <td><label for="apellidos" class="form-label">Apellidos</label></td>
                        <td><input type="text" class="form-text" name="apellidos"></td>
                    </div>
                </tr>
                <tr>
                    <div class="mb-3">
                        <td><label for="nombres" class="form-label">Nombre</label></td>
                        <td><input type="text" class="form-text" name="nombres"></td>
                    </div>
                </tr>
                <tr>
                    <div class="mb-3">
                        <td><label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label></td>
                        <td><input type="date" class="form-date" name="fecha_nacimiento"></td>
                    </div>
                </tr>
                <tr>
                    <div class="mb-3">
                        <td><label for="direccion" class="form-label">Direccion</label></td>
                        <td><input type="text" class="form-text" name="direccion"></td>
                    </div>
                </tr>
                <tr>
                    <div class="mb-3">
                        <td><label for="Telefono" class="form-label">Teléfono</label></td>
                        <td><input type="text" class="form-text" name="telefono"></td>
                    </div>
                </tr>
                <tr><td></td><td><input type="submit" value="Registrar" name="registrar"></td></tr>
            </table>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>