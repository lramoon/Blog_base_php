<?php

if(isset($_POST['submit'])){

    require_once './includes/conexion.php';
    
    $nombre_datos = isset($_POST['nombre_datos']) ? mysqli_real_escape_string($bd,$_POST['nombre_datos']) : false;
    $apellido_datos = isset($_POST['apellido_datos']) ? mysqli_real_escape_string($bd,$_POST['apellido_datos']) : false;
    $email_datos = isset($_POST['email_datos']) ? mysqli_real_escape_string($bd, trim($_POST['email_datos'])) : false;
    $usuario = $_SESSION['usuario']['id'];

    //array de errores
    $errores = array();

    //Validaciones
    if(!empty($nombre_datos) && !is_numeric($nombre_datos) && !preg_match("/[0-9]/", $nombre_datos)){
        $nombre_datos_validado = true;
    }else{
        $errores['nombre_datos'] = "El titulo de la entrada no es valido";
    }
    if(!empty($apellido_datos)  && !is_numeric($apellido_datos) && !preg_match("/[0-9]/", $apellido_datos)){
        $apellido_datos_validado = true;
    }else{
        $errores['apellido_datos'] = "El nombre de la entrada no es valido";
    }
    if(!empty($email_datos) || is_string($email_datos) || filter_var($email_datos, FILTER_VALIDATE_EMAIL)){
        $email_datos_validado = true;
    } else {
        $errores['email_datos'] = "La categoria no es valida";
    }
 
    if(count($errores) == 0){

        $sql = "SELECT id,email FROM usuarios where email = '$email_datos'";
        $isset_email = mysqli_query($bd,$sql);
        $isset_usuario = mysqli_fetch_assoc($isset_email);
        

        if($isset_usuario['id'] == $usuario || empty($isset_usuario)){

            $sql = "UPDATE usuarios set nombre = '$nombre_datos' , apellido = '$apellido_datos', email = '$email_datos' where id = $usuario";
            $query = mysqli_query($bd,$sql);
    
            if($query){
                $_SESSION['usuario'] ['nombre'] = $nombre_datos;
                $_SESSION['usuario'] ['apellido'] = $apellido_datos;
                $_SESSION['usuario'] ['email'] = $email_datos;
                $_SESSION['completado'] = 'Tus datos se han actualizado satisfactoriamente';
                header('location: index.php');
            }else {
                $_SESSION['errores_datos']['general'] = 'Fallo al actualizar el usuario';
            }
        }else {            
            $_SESSION['errores']['general'] = 'Ya hay un usuario existente con este email';
            header('location: index.php');
        }

        
    }else {
        $_SESSION['errores_datos']= $errores;
        header('location: index.php');
    }

}

?>