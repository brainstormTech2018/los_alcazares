<?php 
    session_start();

    require '../admin/config.php';
    require './functions.php';

    // Comprobar session
    if (isset($_SESSION['usuario'])) {
        // Validar los datos por privilegio
        $conexion = conexion($db_config);
        $usuario = iniciarSession('usuarios', $conexion);

        if ($usuario['tipo_usuario'] == 'administrador') {
            header('Location: '.RUTA.'./login/control/admin.php');
        } elseif ($usuario['tipo_usuario'] == 'usuario') {
            header('Location: '.RUTA.'./login/control/usuario.php');
        } else {
            header('Location: '.RUTA.'./login/control/login.php');
        }
    } else {
        header('Location: '.RUTA.'./login/control/login.php');
    }
?>
