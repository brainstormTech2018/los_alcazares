<?php 
    session_start();

    require '../admin/config.php';
    require './functions.php';

    // Comprobar session
    if (!isset($_SESSION['usuario'])) {
        header('Location: '.RUTA.'./login/control/close.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = limpiarDatos($_POST['usuario']);
        $password = limpiarDatos($_POST['password']);
        $password = hash('sha512', $password);
        $rol = $_POST['rol'];

        $errores = '';
        
        // Validacion de que el usuario no exista
        $conexion = conexion($db_config);
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute([
            ':usuario' => $usuario
        ]);
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '<li class="error">Este usuario ya existe</li>';
        }
        

        if($errores == '') {
            $conexion = conexion($db_config);
            $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, password, tipo_usuario) VALUES(null, :usuario, :password, :tipo_usuario)');
            $statement->execute([
                ':usuario' => $usuario,
                ':password' => $password,
                ':tipo_usuario' => $rol
            ]);

            header('Location: '.RUTA.'./login/control/registro.php');
        }
    }
    require '../views/registro.view.php';
?>
