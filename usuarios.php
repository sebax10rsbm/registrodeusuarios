<?php
    class usuarios{
        /**
         * clase de usuario con metodos de inserion y creacion de 
         */
        private function conexion(){
            /**
             * metodo privado de conexion a la base de datos
             */
            $conexion = new PDO('mysql:host=localhost;dbname=taller', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $conexion;
        }
        function crear_usuario($request){
            /**
             * metodo de insersion de usuario
             */
            $conexion = $this->conexion();
            $registrar_usuario = $conexion -> prepare('
                INSERT INTO usuarios (
                    identificacion, 
                    apellidos, 
                    nombres, 
                    fecha_nacimiento, 
                    direccion, 
                    telefono, 
                    fecha_creacion
                ) VALUES (
                    :identificacion, 
                    :apellidos, 
                    :nombres, 
                    :fecha_nacimiento, 
                    :direccion, 
                    :telefono, 
                    now()
                );
            ');
            $registrar_usuario -> bindParam(':identificacion', $request['identificacion']);
            $registrar_usuario -> bindParam(':apellidos', $request['apellidos']);
            $registrar_usuario -> bindParam(':nombres', $request['nombres']);
            $registrar_usuario -> bindParam(':fecha_nacimiento', $request['fecha_nacimiento']);
            $registrar_usuario -> bindParam(':direccion', $request['direccion']);
            $registrar_usuario -> bindParam(':telefono', $request['telefono']);
            if ($registrar_usuario->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function consultar_usuarios(){
            /**
             * metodo de consulta de usuarios
             */
            $conexion = $this->conexion();
            $consulta_usuarios = $conexion -> prepare('
                SELECT
                    id_usuario,
                    identificacion, 
                    apellidos, 
                    nombres, 
                    fecha_nacimiento, 
                    direccion, 
                    telefono, 
                    fecha_creacion
                FROM usuarios
            ;');
            $consulta_usuarios -> execute();
            $usuarios = $consulta_usuarios -> fetchAll();
            return $usuarios;
        }

        function consulta_usuario($id_usuario){
            $conexion = $this -> conexion();
            $consulta_usuario = $conexion -> prepare('
                SELECT
                    id_usuario,
                    identificacion, 
                    apellidos, 
                    nombres, 
                    fecha_nacimiento, 
                    direccion, 
                    telefono, 
                    fecha_creacion
                FROM usuarios
                WHERE id_usuario = :id_usuario 
            ;');
            $consulta_usuario -> bindParam(':id_usuario', $id_usuario);
            $consulta_usuario -> execute();
            $datos_usuario = $consulta_usuario -> fetch();
            return $datos_usuario;
        }

        function actualizar_usuario($datos_update){
            /**
             * metodo de actualizar usuarios
             */
            $conexion = $this -> conexion();
            $actualizar_usuario = $conexion -> prepare('
                UPDATE usuarios SET
                    identificacion = :identificacion,
                    apellidos = :apellidos,
                    nombres = :nombres,
                    fecha_nacimiento = :fecha_nacimiento,
                    direccion = :direccion,
                    telefono = :telefono
                WHERE
                    id_usuario = :id_usuario
            ;');
            $actualizar_usuario -> bindParam(':identificacion', $datos_update['identificacion']);
            $actualizar_usuario -> bindParam(':apellidos', $datos_update['apellidos']);
            $actualizar_usuario -> bindParam(':nombres', $datos_update['nombres']);
            $actualizar_usuario -> bindParam(':fecha_nacimiento', $datos_update['fecha_nacimiento']);
            $actualizar_usuario -> bindParam(':direccion', $datos_update['direccion']);
            $actualizar_usuario -> bindParam(':telefono', $datos_update['telefono']);
            $actualizar_usuario -> bindParam(':id_usuario', $datos_update['id_usuario']);
            if ($actualizar_usuario -> execute()){
                return true;
            } else {
                return false;
            }
        }

        function eliminar_usuario($id_usuario){
            /**
             * metodo de eliminar usuarios
             */
            $conexion = $this -> conexion();
            $eliminar_usuario = $conexion -> prepare('
                DELETE FROM usuarios
                WHERE id_usuario = :id_usuario
            ;');

            if($eliminar_usuario -> execute([':id_usuario' => $id_usuario])){
                return true;
            }
        }
    }
?>