<?php

require_once './includes/conexion.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST)) {

    //Si hay algun error se borra
    if (isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
    }

    $email = trim($_POST['email_login']);
    $password = $_POST['password_login'];

    //consulta para comprobar las credenciales
    $sql = "select * from usuarios where email = '$email'";
    $login = mysqli_query($bd, $sql);

    if ($login && mysqli_num_rows($login) == 1) {

        $usuario = mysqli_fetch_assoc($login);
        var_dump($usuario);
        
        //comprobar contraseña y cifrar
        $verificar = password_verify($password, $usuario['password']);

        if ($verificar) {
            //utilizar sesion para guardar datos del usuarios logeado
            $_SESSION['usuario'] = $usuario;
            if (isset($_SESSION['error_login'])) {
                unset($_SESSION['error_login']);
            }
        } else {
            $_SESSION['error_login'] = 'Login incorrecto';
            //si algo falla enviar sesion con el fallo
        }

    } else {
        $_SESSION['error_login'] = 'Login incorrecto';
    }

}

//redirigir al index
header('location: index.php');

?>