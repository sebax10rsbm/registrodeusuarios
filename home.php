<?php
  require('tools/db.php');
  require('tools/functions.php');

  regenerarCookie();

  $usuario = $_SESSION['usuario']; 
  $datosCuenta = consultaCuenta($usuario);
  $nroCuenta = $datosCuenta['id'];
  $saldoCuenta = $datosCuenta['saldo'];
  $_SESSION['cuenta'] = $datosCuenta['id'];

  //consignaciones
  if (isset($_POST['btnConsignar'])){
    $valor = $_POST['txtValor'];
    if (consignar($nroCuenta, $valor, $usuario)){
      echo("consignacion exitosa");
      header('location: home.php');
    } else {
      header('location: home.php');
    }
  }
  //retiros 
  if (isset($_POST['btnRetirar'])){
    $valor = $_POST['txtValorRetiro'];
    if(retirar($nroCuenta, $valor, $usuario)){
      header('location: home.php');
    } else {
      header('location: home.php');
    }
  }
  
?>


<!DOCTYPE html>
<html lang="es">
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
        <li><a href="index.php">Salir</a></li>
        
      </ul>
    </div>
  </nav>
  <div>
    <div class="container">
        <div class="row">
          <div clas="col s12"></div>
        </div>
        <div clas="col s12"></div>
      <div class="row">
        
        <div class="col s4"></div>
        <div class="col s4">
          Consignar
          <form action="" method="POST">
            <table>
              <tr>
                <td>Numero de cuenta</td>
                <td><?php echo($nroCuenta); ?></td>
              </tr>
              <tr>
                <td>Saldo actual</td>
                <td><?php echo($saldoCuenta); ?></td>
              </tr>
              <tr>
                <td>Valor a consignar</td>
                <td><input type="text" name="txtValor"></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" name="btnConsignar" value="Consignar"></td>
              </tr>
            </table>
          </form>
        </div>
        <div class="col s4"></div>
      </div>
      
    </div>
    <div class="container">
      <div class="row">
        <div class="col s12">
        
        </div>
      </div>
      <div class="row">
        <div class="col s4"></div>
        <div class="col s4">
          Retirar
          <form action="" method="POST">
            <table>
              <tr>
                <td>Valor a retirar</td>
                <td><input type="text" name="txtValorRetiro"></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" name="btnRetirar" value="Retirar"></td>
              </tr>
            </table>
          </form>
        </div>
        <div class="col s4"></div>
      </div>
      
    </div>
  </div>
  <footer class="page-footer footer">
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
