<?php
    function conexion($db_config){
        try {
            $conexion = new PDO('mysql:host=localhost;dbname='.$db_config['db_name'],$db_config['user'],$db_config['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
            return $conexion;
        } catch (PDOException $e) {
            return false;
        }
    }

    function limpiarDatos($datos){
        $datos = htmlspecialchars($datos);
        $datos = trim($datos);
        $datos = filter_var($datos, FILTER_SANITIZE_STRING);
        return $datos;
    }

    function iniciarSession($table, $conexion){
        $statement = $conexion->prepare("SELECT * FROM $table WHERE usuario = :usuario");
        $statement->execute([
            ':usuario' => $_SESSION['usuario']
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
?>
