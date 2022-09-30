<?php
    include('usuarios.php');
    $usuario = new usuarios;

    if (isset($_POST['guardar'])){
        $datos_update = array (
            "identificacion" => $_POST['identificacion'],
            "apellidos" => $_POST['apellidos'],
            "nombres" => $_POST['nombres'],
            "fecha_nacimiento" => $_POST['fecha_nacimiento'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono'],
            "id_usuario" => $_POST['id_usuario'],
        );
        if ($usuario -> actualizar_usuario($datos_update)) {
            echo "usuario actualizado";
            header("Location: http://localhost/taller_ballesteros/consulta.php");
            exit();
        }
    } 
    if (isset($_POST['eliminar'])){
        $id_usuario = $_POST['id_usuario'];
        if ($usuario -> eliminar_usuario($id_usuario)){
            echo "usuario eliminado";
            header("Location: http://localhost/taller_ballesteros/consulta.php");
            exit();
        }
    }
    if (isset($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        $datos_usuario = $usuario -> consulta_usuario($id_usuario);
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
            <div class="col">
                <a href="registro.php"><button type="button" class="btn btn-secondary">Registro</button></a>
                <a href="consulta.php"><button type="button" class="btn btn-secondary">Ver usuarios</button></a>
            </div>
        </div>
        <div class="row">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Id</td>
                        <td>Identificación</td>
                        <td>Apellidos</td>
                        <td>Nombres</td>
                        <td>Fecha de nacimiento</td>
                        <td>Dirección</td>
                        <td>Teléfono</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="id_usuario" value="<?php echo($id_usuario) ?> " readonly></td>
                        <td><input type="text" name="identificacion" value="<?php echo($datos_usuario['identificacion']) ?>"></td>
                        <td><input type="text" name="apellidos" value="<?php echo($datos_usuario['apellidos']) ?>"></td>
                        <td><input type="text" name="nombres" value="<?php echo($datos_usuario['nombres']) ?>"></td>
                        <td><input type="date" name="fecha_nacimiento" value="<?php echo($datos_usuario['fecha_nacimiento']) ?>"></td>
                        <td><input type="text" name="direccion" value="<?php echo($datos_usuario['direccion']) ?>"></td>
                        <td><input type="text" name="telefono" value="<?php echo($datos_usuario['telefono']) ?>"></td>
                        <td><input type="submit" name="guardar" value="Guardar"></td>
                        <td><input type="submit" name="eliminar" value="Eliminar"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>