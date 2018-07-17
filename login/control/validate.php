<?php 
    session_start();

    require '../admin/config.php';
    require './functions.php';

    // Comprobar session
    if (isset($_SESSION['usuario'])) {
        // Validar los datos por privilegio
        $conexion = conexion($db_config);
        $usuario = iniciarSession('usuario', $conexion);
        $_SESSION['userType'] = $usuario['tipo_usuario'];

        if ($usuario['tipo_usuario'] == 'docente') {
            header('Location: '.RUTA.'./views/user.php');
            $_SESSION['docente'] = $usuario['id_docente'];
            echo $_SESSION['docente'];

       } elseif ($usuario['tipo_usuario'] == 'administrativo') {

            header('Location: '.RUTA.'./views/index.php');
           
        } else {
            header('Location: '.RUTA.'./login/control/login.php');
        }
    } else {
        header('Location: '.RUTA.'./login/control/login.php');
    }
?>
