<?php 

if(isset($_POST['submit'])){

    require_once './includes/conexion.php';
    

    $nombre_categoria = isset($_POST['nombre_categoria']) ? mysqli_real_escape_string($bd,$_POST['nombre_categoria']) : false;

    //array de errores
    $errores = array();

    //Validaciones
    if(!empty($nombre_categoria) && !is_numeric($nombre_categoria) && !preg_match("/[0-9]/",$nombre_categoria)){
        $nombre_categoria_validado = true;
    }else{
        $nombre_categoria_validado = false;
        $errores['nombre_categoria'] = "El nombre de la categoria no es valido";
    }

    if(count($errores) == 0){
        $sql = "insert into categorias values(null,'$nombre_categoria')";
        $query = mysqli_query($bd,$sql);

    }

}

header('location: index.php');

?>