<?php
    include('usuarios.php');
    $usuario = new usuarios;
    $usuarios = $usuario -> consultar_usuarios();
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
        <div class="row">
            <div class="col">
                <table>
                    <tr>datos de usuarios</tr>
                    <tr>
                        <td>Id</td>
                        <td>Identificación</td>
                        <td>Apellidos</td>
                        <td>Nombres</td>
                        <td>Fecha de nacimiento</td>
                        <td>Dirección</td>
                        <td>Teléfono</td>
                        <td>Fecha de creación</td>
                    </tr>
                    <?php
                        foreach ($usuarios as $usuario){
                            echo('
                                <tr>
                                    <td>'.$usuario['id_usuario'].'</td>
                                    <td>'.$usuario['identificacion'].'</td>
                                    <td>'.$usuario['apellidos'].'</td>
                                    <td>'.$usuario['nombres'].'</td>
                                    <td>'.$usuario['fecha_nacimiento'].'</td>
                                    <td>'.$usuario['direccion'].'</td>
                                    <td>'.$usuario['telefono'].'</td>
                                    <td>'.$usuario['fecha_creacion'].'</td>       
                                    <td>'.$usuario['fecha_creacion'].'</td>
                                    <td><a href="editar.php?id_usuario='.$usuario['id_usuario'].'">Editar</a></td>
                                </tr>
                            ');
                        }
                    ?>
                    <a href="editar.php?"></a>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>