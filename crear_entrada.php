<?php 

if(isset($_POST['submit'])){

    require_once './includes/conexion.php';
    

    $titulo_entrada = isset($_POST['titulo_entrada']) ? mysqli_real_escape_string($bd,$_POST['titulo_entrada']) : false;
    $descripcion_entrada = isset($_POST['descripcion_entrada']) ? mysqli_real_escape_string($bd,$_POST['descripcion_entrada']) : false;
    $categoria_entrada = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    //array de errores
    $errores = array();

    //Validaciones
    if(!empty($titulo_entrada)){
        $titulo_entrada_validado = true;
    }else{
        $errores['titulo_entrada'] = "El titulo de la entrada no es valido";
    }
    if(!empty($descripcion_entrada)){
        $descripcion_entrada_validado = true;
    }else{
        $errores['descripcion_entrada'] = "El nombre de la entrada no es valido";
    }
    if(!empty($categoria_entrada)){
        $categoria_entrada_validado = true;
    } else {
        $errores['categoria'] = "La categoria no es valida";
    }

    if(count($errores) == 0){

        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET titulo = '$titulo_entrada', descripcion = '$descripcion_entrada', categoria_id = $categoria_entrada WHERE id = $entrada_id AND usuario_id = $usuario_id";
        }else{
            $sql = "INSERT INTO entradas VALUES(null, $usuario, $categoria_entrada, '$titulo_entrada', '$descripcion_entrada', curdate())";
        }

        
        $query = mysqli_query($bd,$sql);
    
        if($query){
            $_SESSION['completado'] = 'El registro se ha completado satisfactoriamente';
            header('location: index.php');
        }else {
            $_SESSION['errores']['general'] = 'Fallo al guardar el usuario';
        }
    }else {
        $_SESSION['errores_entrada']= $errores;
        if(isset($_GET['editar'])){
            header("location: entrada.php?id=".$_GET['editar']);
        }else{
            header('location: crear_entrada.php');
        }
        
    }

}


?>