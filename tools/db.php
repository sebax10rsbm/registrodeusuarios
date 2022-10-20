<?php
  function prueba(){
    echo("holiii");
  }
  function conexionBD(){
    /**
     * conexion con la base de datos, usada para cualquier proceso de manipulacion de datos
     */
    $conexion = new PDO('mysql:host=localhost;dbname=taller_final', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    if ($conexion) {
      return $conexion;
    }
    else{
      $conexion = null;
      return $conexion;
    }
  }

  function registrarUsuario(
    $nombre,$apellido,$numeroIdentificacion,$telefono,$correoElectronico,
    $direccion,$usuario,$clave
  ){
    $conexion = conexionBD();
    $consultaUsuario = $conexion -> prepare('SELECT * FROM taller_final.usuarios WHERE usuario = :usuario');
    $consultaUsuario -> execute([':usuario' => $usuario]);
    $datoUsuario = $consultaUsuario -> fetch();
    if (empty($datoUsuario['usuario'])){
      // creacion de usuario
      $query = 'INSERT INTO taller_final.usuarios
        (identificacion, apellidos, nombres, telefono, correo, direccion, usuario, clave)
        VALUES(:identificacion, :apellidos, :nombres , :telefono, :correo, :direccion, :usuario, :clave);
      ';
      $crearUsuario = $conexion -> prepare($query);
      $crearUsuario -> bindParam(':identificacion', $numeroIdentificacion);
      $crearUsuario -> bindParam(':apellidos', $apellido);
      $crearUsuario -> bindParam(':nombres', $nombre);
      $crearUsuario -> bindParam(':telefono', $telefono);
      $crearUsuario -> bindParam(':correo', $correoElectronico);
      $crearUsuario -> bindParam(':direccion', $direccion);
      $crearUsuario -> bindParam(':usuario', $usuario);
      $crearUsuario -> bindParam(':clave', $clave);
      // creacion de cuenta
      $crearCuenta = $conexion -> prepare('INSERT INTO taller_final.cuentas (usuario, saldo) VALUES(:usuario, 0);');
      $crearCuenta -> bindParam(':usuario', $usuario);
      // resopuesta
      if (($crearUsuario -> execute()) and ($crearCuenta -> execute())){
        return true;
      } else {
        return false;
      }
    }
  }

  function iniciarSesion($usuario, $clave){
    $conexion = conexionBD();
    $consultaUsuario = $conexion -> prepare('SELECT id, usuario FROM usuarios WHERE usuario = :usuario AND clave = :clave;');
    $consultaUsuario -> bindParam(':usuario', $usuario);
    $consultaUsuario -> bindParam(':clave', $clave);
    $consultaUsuario -> execute();
    $usuarioLog = $consultaUsuario -> fetch();
    if (empty($usuarioLog)) {
        return null;
    } else {
        return $usuarioLog;
    }
  }

  function consultaCuenta($usuario){
    $conexion = conexionBD();
    $consultaCuenta = $conexion -> prepare('SELECT * FROM cuentas WHERE usuario = :usuario;');
    $consultaCuenta -> execute([':usuario' => $usuario]);
    $datosCuenta = $consultaCuenta -> fetch();
    return $datosCuenta;
  }

  function consignar($cuenta, $valor, $usuario){
    $conexion = conexionBD();
    $consignacion = $conexion -> prepare('UPDATE cuentas SET saldo = saldo + :valor WHERE id = :id;');
    $consignacion -> bindParam(':valor', $valor);
    $consignacion -> bindParam(':id', $cuenta);
    if ($consignacion -> execute()) {
      $transacciones = $conexion -> prepare('
        INSERT INTO transacciones (
          valor, usuario_origen, usuario_destino
        ) VALUES (
          :valor, :usuario_origen, :usuario_destino
        );'
      );
      $transacciones -> bindParam(':valor', $valor);
      $transacciones -> bindParam(':usuario_origen', $usuario);
      $transacciones -> bindParam(':usuario_destino', $usuario);
      if ($transacciones -> execute()) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  function retirar($cuenta, $valor, $usuario){
    $conexion = conexionBD();
    $consultaSaldo = $conexion -> prepare('SELECT saldo FROM cuentas WHERE id = :id;');
    $consultaSaldo -> execute([':id' => $cuenta]);
    $saldo = $consultaSaldo -> fetch();
    if ($saldo[0] >= $valor){
      $retirar = $conexion -> prepare('UPDATE cuentas SET saldo = saldo - :valor WHERE id = :id');
      $retirar -> bindParam(':valor', $valor);
      $retirar -> bindParam(':id', $cuenta);
      if ($retirar -> execute()) {
        $transacciones = $conexion -> prepare('
          INSERT INTO transacciones (
            valor, usuario_origen, usuario_destino
          ) VALUES (
            0 - :valor, :usuario_origen, :usuario_destino
          );'
        );
        $transacciones -> bindParam(':valor', $valor);
        $transacciones -> bindParam(':usuario_origen', $usuario);
        $transacciones -> bindParam(':usuario_destino', $usuario);
        if ($transacciones -> execute()){
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

?>
