<?php
  require('tools/db.php');
  require('tools/functions.php');
  
  if(isset($_POST['btnEnviar'])){
    $nombre = limpiarCadena($_POST['txtNombre']);
    $apellido = limpiarCadena($_POST['txtApellido']);
    $numeroIdentificacion = limpiarCadena($_POST['txtNumeroIdentificacion']);
    $telefono = limpiarCadena($_POST['txtTelefono']);
    $correoElectronico = limpiarCadena($_POST['txtCorreoElectronico']);
    $direccion = limpiarCadena($_POST['txtDireccion']);
    $usuario = limpiarCadena($_POST['txtUsuario']);
    $clave = md5(limpiarCadena($_POST['txtClave']));
    if (registrarUsuario(
      $nombre,$apellido,$numeroIdentificacion,$telefono,$correoElectronico,
      $direccion,$usuario,$clave
    )) {
      echo(alertJs('Usuario creado Correctamente'));
    } else {
      echo(alertJs('No es posible crear el usuario'));
    }
    
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="main.css">
  <title>Document</title>
</head>
<body>
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Regresar</a></li>
        <li><a href="login.php">Iniciar</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <form action="" method="POST">
      <table>
        <tr>
          <td>Nombres</td>
          <td><input type="text" name="txtNombre"></td>
        </tr>
        <tr>
          <td>Apellidos</td>
          <td><input type="text" name="txtApellido"></td>
        </tr>
        <tr>
          <td>Numero identificacion</td>
          <td><input type="text" name="txtNumeroIdentificacion"></td>
        </tr>
        <tr>
          <td>Telefono</td>
          <td><input type="text" name="txtTelefono"></td>
        </tr>
        <tr>
          <td>Correo electronico</td>
          <td><input type="text" name="txtCorreoElectronico"></td>
        </tr>
        <tr>
          <td>Direccion</td>
          <td><input type="text" name="txtDireccion"></td>
        </tr>
        <tr>
          <td>Usuario</td>
          <td><input type="text" name="txtUsuario"></td>
        </tr>
        <tr>
          <td>Clave</td>
          <td><input type="password" name="txtClave"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="btnEnviar" value="Registrarse"></td>
        </tr>
      </table>
    </form>
  </div>
  <footer class="page-footer footer2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Cooptenjo</h5>
          <p class="grey-text text-lighten-4">Entidad cooperativa de ahorro y credito de Tenjo</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Redes</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">TikTok</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      cooptenjo.com.co
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
