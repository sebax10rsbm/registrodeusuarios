<?php


	function limpiarCadena($cadena){
	    $patron = array('/<script>.*<\/script>/');
	    $cadena = preg_replace($patron, '',$cadena);
	    $cadema = htmlspecialchars($cadena);
	    return $cadena;
	}

  function regenerarCookie()	{
		{
		// Obliga a la sesión a utilizar solo cookies.
		// Habilitar este ajuste previene ataques que impican pasar el id de sesión en la URL.
		if (ini_set('session.use_only_cookies', 1) === FALSE) {
			$action = "error";
			$error = "No puedo iniciar una sesion segura (ini_set)";
		}

		// Obtener los parámetros de la cookie de sesión
		$cookieParams = session_get_cookie_params();
		$path = $cookieParams["path"];

		// Inicio y control de la sesión
		$secure = false;
		$httponly = true;
		$samesite = 'strict';

		session_set_cookie_params([
			'lifetime' => $cookieParams["lifetime"],
			'path' => $path,
			'domain' => $_SERVER['HTTP_HOST'],
			'secure' => $secure,
			'httponly' => $httponly,
			'samesite' => $samesite
		]);

		session_start();
		session_regenerate_id(true);
		}
	}

  function alertJs($mensaje){
    return "<script>alert('".$mensaje."');</script>";
  }

  function cargarPag($pag){
    echo "<script>window.location.href('".$pag."');</script>";
  }
?>
