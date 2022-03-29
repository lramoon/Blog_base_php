<?php


if (isset($_POST['submit'])) {

    require_once './includes/conexion.php';
    if(!isset($_SESSION)) {
        session_start();
    }

    // Recoger los valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd,$_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($bd,$_POST['apellido'])  : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($bd, trim($_POST['email']) ) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($bd,$_POST['password']) : false;

    //array de errores
    $errores = array();

    //validar datos antes de guardar en la bd
    // Validar nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $errores['nombre'] = 'El nombre no es valido';
    }
    // Validar apellido
    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
        $apellido_validado = true;
    } else {
        $errores['apellido'] = 'Los apellidos no son validos';
    }
    //validar email
    if (empty($email) || !is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El email no es valido';
    } else {
        $email_validado = true;
    }
    //validar password
    if (empty($password) || strlen($password) <= 5) {
        $errores['password'] = 'La password tiene errores';
    } else {
        $password_validado = true;
    }

    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;
        
        //cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        
        $sql = "insert into usuarios values(null,'$nombre','$apellido','$email','$password_segura',curdate())";
        $guardar = mysqli_query($bd,$sql);

        if($guardar){
            $_SESSION['completado'] = 'El registro se ha completado satisfactoriamente';
        }else {
            $_SESSION['errores']['general'] = 'Fallo al guardar el usuario';
        }
        
    } else {
        $_SESSION['errores'] = $errores;
    }

}
header('location: index.php');